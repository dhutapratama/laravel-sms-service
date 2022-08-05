<?php

namespace App\Libraries\Listeners;

use App\Libraries\PrintLog;
use App\Models\Outbox;
use App\Models\Phone;
use Illuminate\Support\Collection;
use React\EventLoop\Loop;
use React\EventLoop\LoopInterface;

class OutboxListener {
    private $connection;
    private Phone $phone;

    private LoopInterface $loop;
    private $timer;

    public function __construct($connection, $phone)
    {
        $this->connection = $connection;
        $this->phone = $phone;
    }

    // Listen outbox and send to phone
    public function run()
    {
        $phone = $this->phone;
        $outbox = $this->outbox = new Collection();

        // Listeners
        $this->loop = Loop::get();

        // Outbox Listener - Listen penambahan row dari table outbox dan menyimpan kedalam variable
        $this->timer = $this->loop->addPeriodicTimer(5, function () use ($phone, &$outbox) {
            if ($outbox->count() > 0)
                return false;

            // Get outbox from database
            $outbox = Outbox::where('phone_id', $phone->id)
                ->where('status', "new")->get();

            if ($outbox->count() > 0)
               PrintLog::server("New outbox [" . $this->connection->resourceId . "]: " . $outbox->count() . " items");

            $limit = 10;
            if ($outbox->count() > $limit) {
                // Give phone to breath
                PrintLog::server("Sending " . $limit . " outbox, limited by setting");
                $outbox = Outbox::where('phone_id', $phone->id)
                    ->where('status', "new")->limit($limit)->get();
            }

            // Send to phone with message id
            foreach ($outbox as $key => $send) {
                // Logging
                $logText = sprintf("Sending -> ID: %s | TO: %s | MSG: %s ", $send->id, $send->destination_number, $send->text);
                PrintLog::tx($this->connection, $logText);

                // Sending to client
                $tx = [
                    "command" => "send",
                    "data" => $send
                ];
                $this->connection->send(json_encode($tx));

                $send->status = "sending";
                $send->save();

                $outbox->forget($key);
            }
        });

        $this->loop->run();
    }

    public function stop()
    {
        //$this->loop->stop();
        $this->loop->cancelTimer($this->timer);

        PrintLog::server("OutboxListener Stopped [" . $this->connection->resourceId . "]");
    }
}
