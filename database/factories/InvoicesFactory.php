<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Invoices;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoices>
 */
class InvoicesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Invoices::class;
    public function definition(): array
    {
        $status = $this->faker->randomElement(["B", "I", "V"]);
        return [
            'customer_id' => Customer::factory(),
            'amount' => $this->faker->numberBetween(100, 5000),
            'status' => $status,
            'bill_dated' => $this->faker->dateTimeThisDecade(),
            'paid_dated' => $status === "P" ? $this->faker->dateTimeThisDecade() : null,
        ];
    }
}
