<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedBusiness extends Model
{
    use HasFactory;
    protected $table = 'saved_businesses';
    protected $guarded  = [];

    public function businessDetails()
    {
        return $this->belongsTo(Business::class, 'business_id');
    }
    public function customerDetails()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
