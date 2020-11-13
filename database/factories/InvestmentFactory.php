<?php

namespace Database\Factories;

use App\Models\Investment;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvestmentFactory extends Factory {

    protected $model = Investment::class;

    public function definition()
    : array {

        return [
            'successful' => $this->faker->boolean,
            'amount'     => $this->faker->numberBetween(100000, 1000000000)
        ];
    }
}
