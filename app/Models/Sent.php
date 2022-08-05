<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sent extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        "insert_at",
        "phone_id",
        "destination_number",
        "text",
        "status_sent",
        "status_delivery",
    ];

    protected $casts = [
        "insert_at" => "datetime"
    ];
}
