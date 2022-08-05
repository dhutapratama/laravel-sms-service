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
    Schema::create('sents', function (Blueprint $table) {
      $table->id();
      $table->timestamp('insert_at', $precision = 0);
      $table->foreignId("phone_id")->constrained("phones");
      $table->string("destination_number");
      $table->string("text");
      $table->string("status_sent")->nullable();
      $table->string("status_delivery")->nullable();
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
    Schema::dropIfExists('sents');
  }
};
