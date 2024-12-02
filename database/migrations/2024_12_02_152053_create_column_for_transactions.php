<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnForTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->string('total_balance')->nullable();
            $table->string('trasnfer_amount')->nullable();
            $table->string('transfer_source_account')->nullable();
            $table->string('transfer_destination_account')->nullable();
            $table->string('transfer_date')->nullable();
            $table->string('amount_received')->nullable();
            $table->string('amount_paid')->nullable();
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
            $table->string('total_balance')->nullable();
            $table->string('trasnfer_amount')->nullable();
            $table->string('transfer_source_account')->nullable();
            $table->string('transfer_destination_account')->nullable();
            $table->string('transfer_date')->nullable();
            $table->string('amount_received')->nullable();
            $table->string('amount_paid')->nullable();
        });
    }
}