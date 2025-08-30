<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiries extends Model
{
    use HasFactory;
   protected $table = 'inquiries';
    protected $guarded  = [];

    public function businessDetails()
    {
        return $this->belongsTo(Business::class,'business_id');
    }

    public function productDetails()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function customerDetails()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }
}
