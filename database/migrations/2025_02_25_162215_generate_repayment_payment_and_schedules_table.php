<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GenerateRepaymentPaymentAndSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repayment_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->constrained()->onDelete('cascade'); // Loan Reference
            $table->unsignedBigInteger('business_id');
            $table->foreign('business_id')->on('users')->references('business_id')->onDelete('cascade');
            $table->foreignId('customer_id')->constrained()->onDelete('cascade'); // Loan Reference
            $table->foreignId('loan_id')->constrained()->onDelete('cascade'); // Loan Reference
            $table->decimal('principal_amount', 15, 2);
            $table->decimal('interest_amount', 15, 2);
            $table->decimal('total_amount_due', 15, 2);
            $table->decimal('amount_due', 15, 2);
            $table->date('due_date');
            $table->enum('status', ['Pending', 'Paid', 'Overdue'])->default('Pending');
            $table->timestamps();
        });

        Schema::create('loan_repayments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_id')->constrained()->onDelete('cascade');
            $table->foreignId('branch_id')->constrained()->onDelete('cascade'); // Loan Reference
            $table->foreignId('business_id')->constrained()->onDelete('cascade'); // Loan Reference
            $table->foreignId('customer_id')->constrained()->onDelete('cascade'); // Loan Reference
            $table->foreignId('schedule_id')->constrained('repayment_schedules')->onDelete('cascade');
            $table->decimal('inflow_amount', 15, 2);
            $table->date('payment_date');
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
        //
    }
}
