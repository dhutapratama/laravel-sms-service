<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
  use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name',
    'email',
    'password',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  /**
   * Get all of the phones for the User
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function phones(): HasMany
  {
    return $this->hasMany(Phone::class);
  }

  /**
   * Get all of the outboxes for the User
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function outboxes(): HasManyThrough
  {
    return $this->hasManyThrough(Phone::class, Outbox::class);
  }

  /**
   * Get all of the sents for the User
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function sents(): HasManyThrough
  {
    return $this->hasManyThrough(Phone::class, Sent::class);
  }
}
