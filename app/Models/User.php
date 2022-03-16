<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

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

  public function scopeFilter($query, array $filter)
  {
    $query->when($filter['search'] ?? false, function ($query, $search) {
      $query->where(function ($query) use ($search) {
        $query->where('name', 'like', "%$search%")
          ->orWhere('email', 'like', "%$search%");
      });
    });

    $query->where('active', $filter['active']);

    $query->when($filter['sortField'] ?? false, function ($query, $sortField) use ($filter) {
      $query->orderBy($sortField, $filter['sortAsc'] ? 'asc' : 'desc');
    });
  }
}
