<?php

namespace App\Libraries;

class PrintLog
{
    public static function rx($conn, $msg)
    {
        echo sprintf("[%s][%s][%s] %s\n", date("H:i:s"), "RX", $conn->resourceId, $msg);
    }

    public static function tx($conn, $msg)
    {
        echo sprintf("[%s][%s][%s] %s\n", date("H:i:s"), "TX", $conn->resourceId, $msg);
    }

    public static function server($msg)
    {
        echo sprintf("[%s][%s][%s] %s\n", date("H:i:s"), "SR", "SERVER", $msg);
    }
}
