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

    protected $guarded = [];

    public function userDetails()
    {
        return $this->hasOne(User::class,'business_id');
    }
    public function masterType()
    {
        return $this->belongsTo(MasterType::class, 'master_id');
    }
    public function locationDetails()
    {
        return $this->belongsTo(MasterType::class, 'location_id');
    }

}
