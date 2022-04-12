<?php

namespace Database\Factories;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpenseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Expense::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'details' => $this->faker->text(),
            'amount' => $this->faker->numberBetween(100, 1000),
            'expense_date' => $this->faker->date('d/m/y'),
        ];
    }
}
