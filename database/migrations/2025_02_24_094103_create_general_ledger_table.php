<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralLedgerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_ledger', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id')->unique(); // Unique transaction reference
            $table->foreignId('account_id')->constrained('chart_of_accounts')->onDelete('cascade'); // Links to Chart of Accounts
            $table->string('transaction_type')->comment('e.g. Loan Disbursement, Repayment, Interest, Expense');
            $table->decimal('debit', 15, 2)->default(0.00); // Debit entry
            $table->decimal('credit', 15, 2)->default(0.00); // Credit entry
            $table->text('description')->nullable(); // Description of transaction
            $table->date('transaction_date'); // Date of the transaction
            $table->string('reference_id')->nullable(); // Links to related transactions (e.g., loan_id, payment_id)
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
        Schema::dropIfExists('general_ledger');
    }
}
