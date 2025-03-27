<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\Customers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */


    protected $model = Transaction::class;

    public function definition()
    {
        $totalAmountReceived = $this->faker->randomFloat(2, 1000, 5000);
        $totalAmountPaid = $this->faker->randomFloat(2, 500, 3000);
        $balance = $totalAmountReceived - $totalAmountPaid;
        $user = User::InRandomOrder()->first();
        $business_id = $user->business_id;

        // Fetch a random account number from the Customer model
        $customer = Customers::inRandomOrder()->first();

        return [
            'account_number' => $customer ? $customer->customer_id : null, // Fetch account number
            'account_name' => $this->faker->name,
            'branch_id' => $customer ? $customer->branch_id : $this->faker->numberBetween(1, 10), // Fetch branch ID or random
            'deposit_date' => $this->faker->date('Y-m-d'),
            'withdrawal_date' => $this->faker->optional()->date('Y-m-d'),
            'outflow_amount' => $totalAmountReceived,
            'inflow_amount' => $totalAmountPaid,
            'transaction_id' => substr(Str::uuid()->toString(), 0, 15), // Random 15-character transaction ID
            'narration' => $this->faker->sentence,
            'withdrawn_by' => $this->faker->optional()->name,
            'depositor_name' => $this->faker->name,
            'depositor_phone' => $this->faker->phoneNumber,
            'savings_product' => $this->faker->randomElement(['Savings Account', 'Fixed Deposit', 'Current Account']),
            'transfer_amount' => $this->faker->optional()->randomFloat(2, 100, 1000),
            'transfer_source_account' => $this->faker->optional()->numberBetween(1000000000, 9999999999),
            'transfer_destination_acconut' => $this->faker->optional()->numberBetween(1000000000, 9999999999),
            'transfer_date' => $this->faker->optional()->date('Y-m-d'),
            'total_balance' => $balance,
            'customer_id' => $customer ? $customer->id : null, // Assign the customer ID
            'business_id' => $business_id,
            'staff' => $user->name,
            'transaction_type' => $this->faker->randomElement(['Deposit', 'Withdrawal', 'Transfer']),
        ];
    }
}
