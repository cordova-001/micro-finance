<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeAmountTypeTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->decimal('inflow_amount', 15, 2)->nullable()->default(0.00);  // 15 digits total, 2 decimal places
            $table->decimal('outflow_amount', 15, 2)->nullable()->default(0.00);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->decimal('inflow_amount', 15, 2)->nullable()->default(0.00);  // 15 digits total, 2 decimal places
            $table->decimal('outflow_amount', 15, 2)->nullable()->default(0.00);
        });
    }
}
