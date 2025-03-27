<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteColumnFromTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            // $table->dropColumn('total_balance');
            $table->dropColumn('transfer_amount');
            $table->dropColumn('transfer_source_account');
            $table->dropColumn('transfer_destination_acconut');
            $table->dropColumn('transfer_date');
            $table->dropColumn('outflow_amount');
            $table->dropColumn('inflow_amount');
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
            $table->dropColumn('total_balance');
            $table->dropColumn('trasnfer_amount');
            $table->dropColumn('transfer_source_account');
            $table->dropColumn('transfer_destination_acconut');
            $table->dropColumn('transfer_date');
            $table->dropColumn('outflow_amount');
            $table->dropColumn('inflow_amount');
        });
    }
}
