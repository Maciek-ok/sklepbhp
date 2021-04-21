<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$categories=[
    			'kat1',
    			'hate2',
    			'kate4',
    			'kate5',

    	];

    	foreach ($categories as $category) {
    	
    	

        \App\Models\Category::factory()->count(1)->create([
            'name'=>$category]);
        //factory(\App\Models\Category::class)->create([
        //'name'=>$category]);
        }
    }
}
