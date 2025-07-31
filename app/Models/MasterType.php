<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterType extends Model
{
    use HasFactory;
    protected $table = 'master_types';
    protected $guarded  = [];
    public function getActiveMasterData()
    {
        return $this->hasMany(Masters::class, 'master_type_id')->where('status','Active');
    }
}
