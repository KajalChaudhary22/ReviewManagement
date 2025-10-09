<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteReview extends Model
{
    use HasFactory;
    protected $table = 'website_reviews';
    protected $guarded = [];
    // protected $fillable = [
    //     'company-name',
    //     'rating',
    //     'message',
    // ];

}
