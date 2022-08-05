<?php

namespace App\Libraries;

use App\Libraries\Command\Disconnect;
use App\Libraries\Command\Register;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\RFC6455\Messaging\Frame;
use React\EventLoop\Loop;
use React\EventLoop\TimerInterface;

class RatchetComponentSmsServer implements MessageComponentInterface {
    protected $clients;
    protected $phones = [];

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
        $this->loop = Loop::get();
    }

    public function onOpen(ConnectionInterface $conn)
    {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);
        $this->printLog("RX", $conn, "CONNECTED");
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        $this->printLog("RX", $from, $msg);
        $data = json_decode($msg);
        if(!isset($data->command)) {
            $from->send(json_encode([
                "command" => "message",
                "data" => [
                    "message" => "Server tidak menerima command"
                ]
            ]));
        }

        ConnectionManager::command($from, $data->command, $data->data);
    }

    public function onClose(ConnectionInterface $conn)
    {
        ConnectionManager::close($conn);

        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }

    private function printLog($type = "RX", $conn, $msg) {
        echo sprintf("[%s][%s][%s] %s\n", date("H:i:s"), $type, $conn->resourceId, $msg);
    }
}
