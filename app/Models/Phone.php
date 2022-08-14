<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

  /**
   * Get the user that owns the Phone
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }
}
