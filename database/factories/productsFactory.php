<?php

namespace Database\Factories;

use App\Models\products;
use Illuminate\Database\Eloquent\Factories\Factory;

class productsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = products::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name'=>$this->faker->word(),
            'product_desc'=>$this->faker->paragraph(),
            'price'=>$this->faker->numberBetween($int1 = 1000,$int2 = 10000000),
            'category_id' => 3,
            'image'=> ' '
        ];
    }
}
