<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masters extends Model
{
    use HasFactory;
    protected $table = 'masters';
    protected $guarded  = [];

    public function children()
{
    return $this->hasMany(Master::class, 'parent_id');
}

public function parent()
{
    return $this->belongsTo(Master::class, 'parent_id');
}
}
