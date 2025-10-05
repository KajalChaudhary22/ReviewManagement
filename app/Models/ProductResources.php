<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductResources extends Model
{
    use HasFactory;
    protected $table = 'product_resources';
    protected $guarded = [];
}
