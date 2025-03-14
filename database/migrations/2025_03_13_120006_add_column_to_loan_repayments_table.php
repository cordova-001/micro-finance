<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToLoanRepaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('loan_repayments', function (Blueprint $table) {
            $table->decimal('interest_amount', 12, 5)->nullable()->after('paid_amount');
            $table->decimal('principal_amount', 12, 5)->nullable()->after('interest_amount');
            $table->decimal('penalty_amount', 12, 5)->nullable()->after('principal_amount');             
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
            $table->dropColumn('interest_amount');
            $table->dropColumn('principal_amount');
            $table->dropColumn('penalty_amount');
        });
    }
}
