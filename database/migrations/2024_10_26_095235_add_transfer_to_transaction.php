<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTransferToTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->double('transfer_amount');
            $table->string('transfer_source_account');
            $table->string('transfer_destination_acconut');
            $table->date('transfer_date');
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
            $table->double('transfer_amount');
            $table->string('transfer_source_account');
            $table->string('transfer_destination_acconut');
            $table->date('transfer_date');
        });
    }
}
