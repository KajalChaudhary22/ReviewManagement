<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
     protected $table = 'customers';

    
    protected $guarded = [];

    public function userDetails()
    {
        return $this->hasOne(User::class,'customer_id');
    }
}
