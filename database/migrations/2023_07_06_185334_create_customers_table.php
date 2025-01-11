<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->integer('phone');
            $table->enum('choices', array('Male', 'Female'));	
            $table->string('address');
            $table->string('state_of_origin');
            $table->string('local_govt');
            $table->string('next_of_kin');
            $table->string('address_of_next_of_kin');
            $table->date('date_of_birth');
            $table->string('occupation');
            $table->string('status');
            $table->integer('customer_id');
            $table->unsignedInteger('branch_id');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->unsignedInteger('center_id');
            $table->foreign('center_id')->references('id')->on('center')->onDelete('cascade');
            $table->string('utility');
            $table->string('id_card');
            $table->string('paasport');
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
        Schema::dropIfExists('customers');
    }
}
