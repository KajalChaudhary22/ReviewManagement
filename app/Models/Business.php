<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Business extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'businesses';

    // Corrected spelling
    protected $guarded = [];
}
