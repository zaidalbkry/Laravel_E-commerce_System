<?php

namespace Database\Seeders; // ✅ Ensure correct namespace

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder // ✅ Ensure correct class name
{
    public function run(): void
    {
        DB::table('orders')->insert([
            'user_id' => 1,
            'phone_number' => '094442121',
            'order_number' => 'ORD-' . strtoupper(Str::random(8)),
            'total_price' => 368.76,
            'products_data' => json_encode([
                ['id' => 1, 'name' => 'Vegetables Product 1', 'image' => 'http://127.0.0.1:8000/storage/default.jpg', 'price' => 41.99],
                ['id' => 2, 'name' => 'Vegetables Product 2', 'image' => 'http://127.0.0.1:8000/storage/default.jpg', 'price' => 14.99]
            ]),
            'status' => 'receiving',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
