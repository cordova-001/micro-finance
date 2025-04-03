<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription', function (Blueprint $table) {
            $table->id();
            $table->string('business_id');
            $table->foreign('business_id')->references('business_id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('branch_id');
            $table->foreign('branch_id')->references('id')->on('branch')->onDelete('cascade');
            $table->string('plan_name')->nullable();
            $table->string('plan_id')->nullable();
            $table->string('plan_code')->nullable();
            $table->string('plan_interval')->nullable();
            $table->string('plan_amount')->nullable();
            $table->string('email')->nullable();
            $table->string('status')->nullable(); // active, inactive 
            $table->string('paystack_subscription_code')->nullable();
            $table->string('paystack_email_token')->nullable();
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
        Schema::dropIfExists('subscription');
    }
}
