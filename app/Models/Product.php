<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Product extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'price', 'description', 'image', 'category_id', 'is_important'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

public function orders()
{
    return $this->belongsToMany(Order::class, 'order_product', 'product_id', 'order_id');
}

    public function comments() {
        return $this->hasMany(Comment::class);
    }
public function reviews()
{
    return $this->hasMany(Review::class);
}


 
}
