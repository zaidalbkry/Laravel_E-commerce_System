<?php

namespace Database\Seeders;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // حذف جميع المنتجات قبل الإدخال لتجنب التكرار
        Product::query()->delete();

        // جلب جميع الأصناف
        $categories = Category::all();

        foreach ($categories as $category) {
            // إنشاء 10 منتجات لكل صنف
            for ($i = 1; $i <= 10; $i++) {
                Product::create([
                    'name' => $category->name . ' Product ' . $i,
                    'price' => rand(10, 100) . '.99', // توليد سعر عشوائي بين 10 و 100
                    'description' => 'This is a description for ' . $category->name . ' product ' . $i . "
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam nulla, ea atque, praesentium soluta sit rem placeat voluptate facere ipsam rerum impedit error? Unde officiis est perspiciatis, ullam eum repellat voluptatem totam pariatur, architecto magni esse mollitia libero labore deleniti quas necessitatibus, ducimus ex ipsum repellendus voluptates sit dolor voluptatum nemo inventore! Ipsam, recusandae. Totam excepturi iusto cumque maiores saepe distinctio, officiis quia vitae ipsa eos. Excepturi distinctio repellat nostrum aperiam fuga provident officiis, aliquam voluptatibus accusantium asperiores cumque libero odio quia sint recusandae earum ad sit ipsum nesciunt animi consequuntur iste aliquid? Maiores veniam explicabo praesentium deleniti. Iure facere distinctio nesciunt totam nemo cum fuga, consequuntur vitae neque recusandae mollitia necessitatibus nisi quasi porro tempore dignissimos aliquid maxime accusantium sed, suscipit corrupti? Quis eos harum praesentium! Quis et eligendi consequatur delectus iste minus velit cumque fuga quos, ea, harum eius facere autem eum libero, incidunt ipsa temporibus rem eaque maiores reprehenderit saepe nesciunt possimus? Placeat non, tempora aliquam pariatur reiciendis voluptatem asperiores odit eos alias maiores harum doloremque, possimus quod dolore nihil accusantium autem itaque, labore vel inventore. Officia, ab fuga! Quam illum delectus explicabo dolorum cum, laboriosam cupiditate, quo laudantium ipsam id fugiat debitis, repellendus quia illo magnam?
                    ",
                    'image' => 'default.jpg', 
                    'category_id' => $category->id,
                    'is_important' => rand(0, 1) ? true : false,
                ]);
            }
        }

    }
}
