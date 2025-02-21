<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountSystemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_system', function (Blueprint $table) {
            $table->id();
            $table->string('account_type');
            $table->double('amount');
            $table->date('date');
            $table->string('file');
            $table->string('source_account');
            $table->string('destination_account');
            $table->string('category');
            $table->double('balance');
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
        Schema::dropIfExists('account_system');
    }
}
