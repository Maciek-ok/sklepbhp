<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Product::factory()->count(10)->create();
        //\App\Models\Product::factory()->count(1)->create();
        //factory(App\Models\Product::class, 20)->create();
    }
}
