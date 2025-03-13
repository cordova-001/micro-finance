<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBalanceToGl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('general_ledger', function (Blueprint $table) {
            $table->decimal('balance', 15, 2)->default(0.00)->after('credit'); // Balance after transaction
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('general_ledger', function (Blueprint $table) {
            $table->dropColumn('balance');
        });
    }
}
