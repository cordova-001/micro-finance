<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUpdateToInvestmentProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('investment_products', function (Blueprint $table) {
            $table->date('start_date')->nullable();
            $table->date('closing_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('investment_products', function (Blueprint $table) {
            $table->date('start_date')->nullable();
            $table->date('closing_date')->nullable();
        });
    }
}
