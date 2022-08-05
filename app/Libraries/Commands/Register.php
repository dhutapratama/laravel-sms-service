<?php

namespace App\Libraries\Commands;

use App\Models\Outbox;
use App\Models\Phone;
use Illuminate\Support\Collection;
use Ratchet\ConnectionInterface;
use React\EventLoop\Loop;

/**
 * Meregistrasikan device kedalam database
 */
class Register {
    private $command = "register";

    private $connection;
    private $phone;

    public function __construct(ConnectionInterface $connection, $data = null) {
        $this->connection = $connection;

        $phone = Phone::firstOrNew(
            [ "device_id" => $data->id ],
            [
                "device" => $data->device,
                "brand" => $data->brand,
                "model" => $data->model,
                "simcard" => $data->simCardCount,
                "operator_name " => $data->operatorName,
            ]
        );

        $phone->status = "online";
        $phone->resource_id = $connection->resourceId;
        $phone->save();

        $this->phone = $phone;

        $data = [
            "command" => "registered",
            "data" => [
                "message" => "Registrasi berhasil. DBID: " . $phone->id
            ]
        ];
        $connection->send(json_encode($data));
    }

    public function getPhone() {
        return $this->phone;
    }
}
