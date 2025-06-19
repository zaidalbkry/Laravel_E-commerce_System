<?php
namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\products;
class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'phone_number', 'order_number', 'total_price', 'products_data', 'status'];


    protected $casts = [
        'products_data' => 'array', // تحويل البيانات من JSON إلى Array تلقائيًا
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
public function products()
{
    return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id')->withPivot('quantity');
}


}

