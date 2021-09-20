<?php

namespace Database\Factories;

use App\Models\Product;
use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


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
            'name' => $this->faker->title()." Product ",
            'supplier_reference' => Str::random(5),
            'reference' => Str::random(5),
            'stock_shop' => rand(1,5),
            'stock_supplier' => rand(1,5),
            'tax_id' => 1,
            'short_description' =>  $this->faker->paragraph,
            'price' => rand(2,200),
        ];
    }
}
