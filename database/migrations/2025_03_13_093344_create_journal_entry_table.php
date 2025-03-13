<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalEntryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_entry', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('business_id');
            $table->foreign('business_id')->references('business_id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('branch_id');
            $table->foreign('branch_id')->references('id')->on('branch')->onDelete('cascade');
            $table->string('transaction_id')->unique(); // Unique transaction reference
            // $table->foreignId('account_id')->constrained('chart')->onDelete('cascade'); // Links to Chart of Accounts
            $table->string('transaction_type')->comment('e.g. Loan Disbursement, Repayment, Interest, Expense');
            $table->string('account_number'); // Account number
            $table->string('account_name'); // Account name 
            $table->decimal('debit', 15, 2)->default(0.00); // Debit entry
            $table->decimal('credit', 15, 2)->default(0.00); // Credit entry
            $table->decimal('balance', 15, 2)->default(0.00); // Account balance after transaction 
            $table->text('description')->nullable(); // Description of transaction
            $table->date('transaction_date'); // Date of the transaction
            $table->string('created_by')->nullable(); // User who created the entry
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
        Schema::dropIfExists('journal_entry');
    }
}
