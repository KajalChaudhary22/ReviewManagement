<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $guarded  = [];
    public function categoryDetails()
    {
        return $this->belongsTo(MasterType::class, 'productCategory_id');
    }
    public function businessDetails()
    {
        return $this->belongsTo(Business::class, 'business_id');
    }
    public function images()
    {
        return $this->morphMany(Images::class, 'imageable');
    }
    public function reviewsData()
    {
        return $this->hasMany(Review::class, 'product_id');
    }
    public function ratingData()
    {
        return $this->hasMany(Rating::class, 'product_id');
    }
}
