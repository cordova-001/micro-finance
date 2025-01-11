<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountOfficersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_officers', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('branch_id');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->unsignedInteger('business_id');
            $table->foreign('business_id')->references('business_id')->on('users')->onDelete('cascade');
            $table->string('roles');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_officers');
    }
}
