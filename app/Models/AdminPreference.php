<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminPreference extends Model
{
    use HasFactory;
    protected $table = 'admin_preferences';

    protected $guarded = [];
}
