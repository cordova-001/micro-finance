<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'choices' => $this->faker->randomElement(['Male', 'Female']),
            'address' => $this->faker->address(),
            'state_of_origin' => $this->faker->state(),
            'local_govt' => $this->faker->city(),
            'next_of_kin' => $this->faker->name(),
            'address_of_next_of_kin' => $this->faker->address(),
            'date_of_birth' => $this->faker->date('Y-m-d', '2005-12-31'),
            'occupation' => $this->faker->jobTitle(),
            'status' => $this->faker->randomElement(['Active', 'Inactive']),
            'customer_id' => $this->faker->unique()->numberBetween(1111111, 9999999),
            'branch_id' => $this->faker->numberBetween(1, 10),
            'business_id' => $this->faker->numberBetween(100, 999),
            'utility' => $this->faker->randomElement(['Electricity Bill', 'Water Bill']),
            'id_card' => $this->faker->randomElement(['Voter ID', 'Driver License', 'National ID']),
            'paasport' => $this->faker->imageUrl(150, 150, 'people'), // Generates a placeholder image
        ];
    }
}
