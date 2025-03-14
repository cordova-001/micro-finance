<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Drop3ColumnFromLoanRepayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('loan_repayments', function (Blueprint $table) {
            $table->dropColumn('interest_amount');
            $table->dropColumn('principal_amount');
            $table->dropColumn('paid_amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('loan_repayments', function (Blueprint $table) {
            $table->decimal('interest_amount', 12, 5);
            $table->decimal('principal_amount', 12, 5);
            $table->decimal('paid_amount', 12, 5);
        });
    }
}
