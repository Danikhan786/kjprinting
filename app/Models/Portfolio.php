<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portfolio extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',         // Optional title for the portfolio item
        'image_path',    // Path to the uploaded image
        'category_id',   // Foreign key to the category
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
