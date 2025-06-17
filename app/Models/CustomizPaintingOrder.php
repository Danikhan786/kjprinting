<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class CustomizPaintingOrder extends Model
{
    use HasFactory;
    protected $table = 'customiz_painting_orders';

    protected $fillable = [
        'name',
        'address',
        'email',
        'phone',
        'subject',
        'comment',
    ];
}
