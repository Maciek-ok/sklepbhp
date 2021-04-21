<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;


class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           //'category_id'=>$this->faker->numberBetween($min = 1, $max = 4),
          'category_id'=>\App\Models\Category::inRandomOrder()->first()->id,
            'name' => $this->faker->sentence($nbWords = 1, $variableNbWords = true),
            'price' => $this->faker->numberBetween($min = 1000, $max = 9000),
            'description'=>$this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'amount'=>$this->faker->numberBetween($min = 5, $max = 100),
            
        ];
    }
}
