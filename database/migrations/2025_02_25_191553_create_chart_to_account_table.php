<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChartToAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chart_to_account', function (Blueprint $table) {
            $table->id();
            $table->string('account_code')->unique(); // e.g., 101, 201
            $table->string('account_name'); // e.g., Cash/Bank, Loan Receivable
            $table->enum('account_type', ['Asset', 'Liability', 'Equity', 'Income', 'Expense']);
            $table->text('description')->nullable();
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
        Schema::dropIfExists('chart_to_account');
    }
}
