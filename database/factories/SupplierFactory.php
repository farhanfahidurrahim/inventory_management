<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->company,
            'image'=>$this->faker->imageUrl(250,250),
            'email'=>$this->faker->unique()->safeEmail,
            'phone'=>$this->faker->phoneNumber,
            'address'=>$this->faker->address,
            'status' =>$this->faker->randomElement(['1','2']),
        ];
    }
}
