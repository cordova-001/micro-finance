<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToLedger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('general_ledger', function (Blueprint $table) {
            $table->foreignId('account_id')->constrained('chart')->onDelete('cascade'); // Links to Chart of Accounts
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
            //
        });
    }
}
