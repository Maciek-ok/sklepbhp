<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        //UserSeeder::class,
        CategoriesSeeder::class,
        ProductsSeeder::class,
       //$this->call(CategoriesSeeder::class);
        //$this->call(ProductsSeeder::class);
        //\App\Models\User::factory(10)->create();
        //\App\Models\Category::factory(10)->create();
        //\App\Models\Product::factory(10)->create();
    ]);
    }
}
