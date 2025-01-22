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
            $table->unsignedInteger('branch_id');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->string('business_id');            
            $table->string('loan_product'); // E.g., Personal, Mortgage, Auto
            $table->decimal('loan_amount', 15, 2); // Loan amount
            $table->decimal('total_repayment_amount', 15, 2); // total repayment amount
            $table->decimal('each_repayment_amount', 15, 2); // each repayment amount
            $table->decimal('interest_rate', 5, 2); // Interest rate percentage
            $table->integer('repayment_period'); // Duration in months
            $table->decimal('frequency', 15, 2); // Monthly or weekly payment
            $table->date('application_date'); // Loan application date
            $table->date('start_date'); // Loan start date
            $table->string('staff');
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
