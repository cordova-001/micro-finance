<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {            
            $table->string('state_of_origin')->nullable()->change();
            $table->string('local_govt')->nullable()->change();
            $table->string('next_of_kin')->nullable()->change();
            $table->string('address_of_next_of_kin')->nullable()->change();
            $table->date('date_of_birth')->nullable()->change();
            $table->string('occupation')->nullable()->change();
            $table->string('status')->nullable()->change();            
            $table->string('passport')->nullable()->change();
            $table->string('uploads')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->string('state_of_origin')->nullable(false)->change();
            $table->string('local_govt')->nullable(false)->change();
            $table->string('next_of_kin')->nullable(false)->change();
            $table->string('address_of_next_of_kin')->nullable(false)->change();
            $table->date('date_of_birth')->nullable(false)->change();
            $table->string('occupation')->nullable(false)->change();
            $table->string('status')->nullable(false)->change();            
            $table->string('passport')->nullable(false)->change();
            $table->string('uploads')->nullable(false)->change();
        });
    }
}
