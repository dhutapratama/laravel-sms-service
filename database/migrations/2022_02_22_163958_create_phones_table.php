<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('phones', function (Blueprint $table) {
      $table->id();
      $table->string("device_id")->nullable();
      $table->string("imei")->nullable();
      $table->string("device")->nullable();
      $table->string("brand")->nullable();
      $table->string("model")->nullable();
      $table->string("simcard")->nullable();
      $table->string("operator_name")->nullable();
      $table->enum("status", ["offline", "online"])->default("offline");
      $table->integer("resource_id", false, true)->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('phones');
  }
};
