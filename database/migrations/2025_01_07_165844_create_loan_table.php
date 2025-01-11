<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Reference to the user who took the loan
            $table->string('loan_type'); // E.g., Personal, Mortgage, Auto
            $table->decimal('amount', 15, 2); // Loan amount
            $table->decimal('interest_rate', 5, 2); // Interest rate percentage
            $table->integer('duration'); // Duration in months
            $table->decimal('monthly_payment', 15, 2); // Monthly payment
            $table->date('start_date'); // Loan start date
            $table->enum('status', ['pending', 'approved', 'rejected', 'completed'])->default('pending'); // Loan status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
