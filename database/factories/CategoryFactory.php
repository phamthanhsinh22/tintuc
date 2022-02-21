<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'catName'=>$this->faker->name(),
            'slug_cate'=>$this->faker->name(),
            'Active'=>$this->faker->randomElement($array = array('0','1'))
        ];
    }
}
