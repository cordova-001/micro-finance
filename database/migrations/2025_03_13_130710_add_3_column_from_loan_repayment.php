<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Add3ColumnFromLoanRepayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('loan_repayments', function (Blueprint $table) {
            $table->decimal('interest_paid', 12, 5);
            $table->decimal('principal_paid', 12, 5);
            $table->decimal('total_paid', 12, 5);
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
            $table->dropColumn('interest_paid');
            $table->dropColumn('principal_paid');
            $table->dropColumn('total_paid');
        });
    }
}
