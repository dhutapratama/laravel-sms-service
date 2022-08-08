<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outbox extends Model
{
  use HasFactory;

  protected $fillable = [
    "phone_id",
    "destination_number",
    "text",
    "status",
  ];

  public function phone()
  {
    return $this->belongsTo(Phone::class);
  }
}
