<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centers', function (Blueprint $table) {
            $table->id('id');
            // $table->unsignedInteger('branch_id');
            $table->string('center_name');
            $table->string('address');
            $table->string('email');
            $table->string('phone');
            $table->string('center_id');
            $table->string('branch_id');
                // ->references('id')
                // ->on('branches')
                // ->onDelete('cascade');
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
        Schema::dropIfExists('centers');
    }
}
