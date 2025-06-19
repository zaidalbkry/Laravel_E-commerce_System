<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::query()->delete(); 

        $categories = [
            ['name' => 'Vegetables'],
            ['name' => 'Fruits'],
            ['name' => 'Meat'],
            ['name' => 'Fish'],
            ['name' => 'Bakery and Sweets'],
        ];
    
        Category::insert($categories);

    }
}
