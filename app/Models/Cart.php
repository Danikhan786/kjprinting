<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'session_id',
        'product_id',
        'quantity',
        'price',
        'total_price',
    ];

    // Relationship: A cart item belongs to a product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
