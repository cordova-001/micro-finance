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
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('gender');
            $table->string('address');
            $table->string('state_of_origin');
            $table->string('local_govt');
            $table->string('next_of_kin');
            $table->string('address_of_next_of_kin');
            $table->string('date_of_birth');
            $table->string('occupation');
            $table->string('status');
            $table->string('customer_id');
            $table->string('branch');
            $table->string('center');
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
