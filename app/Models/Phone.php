<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
  use HasFactory;

  protected $fillable = [
    "device_id",
    "device",
    "imei",
    "brand",
    "model",
    "simcard",
    "operator_name",
    "status",
    "resource_id"
  ];
}
