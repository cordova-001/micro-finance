<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnFromTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('transaction_id');
            $table->dropColumn('narration');
            $table->dropColumn('withdrawn_by');
            $table->dropColumn('depositor_name');
            $table->dropColumn('depositor_phone');
            $table->dropColumn('savings_product');
            $table->dropColumn('total_balance');
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
            //
        });
    }
}
