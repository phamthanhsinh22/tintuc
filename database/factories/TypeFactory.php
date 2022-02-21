<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Type;
use App\Models\Category;

class TypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'typName'=>$this->faker->name(),
            'slug_typ'=>$this->faker->name(),
            'Active'=>$this->faker->randomElement($array = array('0','1')),
            'category_id'=>Category::all()->random()->id
        ];
    }
}
