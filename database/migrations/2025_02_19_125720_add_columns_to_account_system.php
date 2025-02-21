<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToAccountSystem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_system', function (Blueprint $table) {
            $table->unsignedInteger('branch_id');
            $table->foreign('branch_id')->on('branches')->references('id')->onDelete('cascade');
            $table->unsignedInteger('business_id');
            $table->foreign('business_id')->on('user')->references('business_id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_system', function (Blueprint $table) {
            //
        });
    }
}
