<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 
        'price', 
        'image', 
        'short_description', 
        'long_description', 
        'images', 
        'video', 
        'category_id', 
        'slug'
    ];

    // Cast images to array
    protected $casts = [
        'images' => 'array',
    ];

    // Relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Generate Slug from Name
    public static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->slug = \Str::slug($product->name);
        });
    }

    public function reviews()
    {
        return $this->hasMany(Review::class)->where('status', true);
    }
    public function cartItems()
    {
        return $this->hasMany(Cart::class, 'product_id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

