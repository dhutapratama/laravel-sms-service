<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Outbox extends Model
{
  use HasFactory;

  protected $fillable = [
    "phone_id",
    "destination_number",
    "text",
    "status",
  ];

  /**
   * Get the phone that owns the Outbox
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function phone(): BelongsTo
  {
    return $this->belongsTo(Phone::class);
  }
}
