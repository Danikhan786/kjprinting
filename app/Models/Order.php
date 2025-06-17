<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id', // Add this field
        'first_name',
        'last_name',
        'email',
        'phone',
        'country',
        'state',
        'postal_code',
        'address_line1',
        'address_line2',
        'subtotal',
        'total',
        'quantity',
        'payment_method',
    ];

    // Define the relationship to the Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
