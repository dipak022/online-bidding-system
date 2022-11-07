<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
  
    protected $fillable = [
        'name',
        'category_id',
        'details',
        'regular_price',
        'starting_bidding_amount',
        'bidding_end_date',
        'image',
        'new',
        'featured',
        'auth_id',
        'active',
    ];
}
