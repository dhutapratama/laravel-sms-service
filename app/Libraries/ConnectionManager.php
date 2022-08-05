<?php

namespace App\Libraries;

use App\Libraries\Commands\Delivery;
use App\Libraries\Commands\Register;
use App\Libraries\Commands\Sent;

use App\Libraries\Listeners\OutboxListener;

use App\Models\Phone;

class ConnectionManager {
    public static $outboxListener = [];

    public static function command($connection, $command, $data) {
        switch ($command) {
            case 'register':
                self::onRegister($connection, $data);
                break;

            case 'sent':
                new Sent($data);
                break;

            case 'delivery':
                new Delivery($data);
                break;

            default:
                $connection->send(json_encode([
                    "command" => "message",
                    "data" => [
                        "message" => "Server tidak dapat mengenali command"
                    ]
                ]));
                break;
        }
    }

    private static function onRegister($connection, $data)
    {
        $register = new Register($connection, $data);
        $outboxListener = new OutboxListener($connection, $register->getPhone());

        self::$outboxListener[$connection->resourceId] = $outboxListener;
        $outboxListener->run();
    }

    public static function close($connection) {
        ConnectionManager::$outboxListener[$connection->resourceId]->stop();
        unset(ConnectionManager::$outboxListener[$connection->resourceId]);

        $phone = Phone::where("resource_id", $connection->resourceId)->first();
        if ($phone) {
            $phone->status = "offline";
            $phone->resource_id = null;
            $phone->save();
        }
    }
}
