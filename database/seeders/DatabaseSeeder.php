<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CategorySeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            OrderSeeder::class,
        ]);
       
        User::factory()->create([
            'name' => 'Humam',
            'role' => 'admin',
            'email' => 'Real5evermha@gmail.com',
            'password' => Hash::make('Real5evermha@gmail.com'),
        ]);
    }
}
