<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorporateAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporate_account', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->required();
            $table->string('company_address')->nullable();
            $table->string('company_email')->nullable();
            $table->string('company_phone')->nullable();
            $table->string('tin')->nullable();
            $table->string('bvn')->nullable();
            $table->string('cac_rc_no')->nullable();
            $table->unsignedBigInteger('branch_id');
            $table->foreign('branch_id')->references('id')->on('branch')->onDelete('cascade');             
            $table->string('uploads')->nullable();
            $table->string('director_1_fname')->nullable();
            $table->string('director_1_mname')->nullable();
            $table->string('director_1_surname')->nullable();
            $table->string('director_1_email')->nullable();
            $table->string('director_1_phone')->nullable();
            $table->string('director_1_address')->nullable();
            $table->string('director_1_passport')->nullable();
            $table->string('director_2_fname')->nullable();
            $table->string('director_2_mname')->nullable();
            $table->string('director_2_surname')->nullable();
            $table->string('director_2_email')->nullable();
            $table->string('director_2_phone')->nullable();
            $table->string('director_2_address')->nullable();
            $table->string('director_2_passport')->nullable();
            $table->string('director_3_fname')->nullable();
            $table->string('director_3_mname')->nullable();
            $table->string('director_3_surname')->nullable();
            $table->string('director_3_email')->nullable();
            $table->string('director_3_phone')->nullable();
            $table->string('director_3_address')->nullable();
            $table->string('director_3_passport')->nullable();
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
        Schema::dropIfExists('corporate_account');
    }
}
