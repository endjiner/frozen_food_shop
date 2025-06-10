<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image',
    ];

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
