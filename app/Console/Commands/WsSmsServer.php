<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Ratchet\WebSocket\WsServer;
use Ratchet\Server\IoServer;
use App\Libraries\RatchetComponentSmsServer;
use Ratchet\Http\HttpServer;

class WsSmsServer extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'serve:ws';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'WebSocket service for android SMS Server Provider';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return int
   */
  public function handle()
  {


    // ASCII ART
    printf("[%s] ", date("H:i:s"));
    $asciiArt = "DLabs Web Socket Server - V1.0 (2022)\n\n";
    $asciiArt .= "───▄▀▀▀▄▄▄▄▄▄▄▀▀▀▄───\n";
    $asciiArt .= "───█▒▒░░░░░░░░░▒▒█───\n";
    $asciiArt .= "────█░░█░░░░░█░░█────\n";
    $asciiArt .= "─▄▄──█░░░▀█▀░░░█──▄▄─\n";
    $asciiArt .= "█░░█─▀▄░░░░░░░▄▀─█░░█\n";
    $asciiArt .= "█▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀█\n";
    $asciiArt .= "█░░╦─╦╔╗╦─╔╗╔╗╔╦╗╔╗░░█\n";
    $asciiArt .= "█░░║║║╠─║─║─║║║║║╠─░░█\n";
    $asciiArt .= "█░░╚╩╝╚╝╚╝╚╝╚╝╩─╩╚╝░░█\n";
    $asciiArt .= "█▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄█\n";
    $asciiArt .= "\n";

    echo $asciiArt;

    // echo "adb shell";
    // echo "settings put global sms_outgoing_check_max_count 900000";
    // echo "RESTART PHONE!";

    $wsServer = new WsServer(new RatchetComponentSmsServer());
    $server = IoServer::factory(new HttpServer($wsServer), 8080);

    $wsServer->enableKeepAlive($server->loop, 5);
    $server->run();
  }
}
