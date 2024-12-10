<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
//        ProductCategory::factory()->create([
//            'name' => 'Produce'
//        ]);
//        ProductCategory::factory()->create([
//            'name' => 'Dry Goods'
//        ]);
//        ProductCategory::factory()->create([
//            'name' => 'Baking Supplies'
//        ]);
//        ProductCategory::factory()->create([
//            'name' => 'Cooking Supplies'
//        ]);
//        ProductCategory::factory()->create([
//            'name' => 'Treats'
//        ]);
//        ProductCategory::factory()->create([
//            'name' => 'Coffee and Teas'
//        ]);
        ProductCategory::factory()->create([
            'name' => 'Drinks'
        ]);
        ProductCategory::factory()->create([
            'name' => 'Cookies'
        ]);
        ProductCategory::factory()->create([
            'name' => 'Soups'
        ]);
        Product::factory(200)->create();
        Product::factory(50)->create();
    }
}
