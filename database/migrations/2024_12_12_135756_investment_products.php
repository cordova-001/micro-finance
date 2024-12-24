<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InvestmentProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investment_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_code')->unique();
            $table->text('description')->nullable();
            $table->decimal('min_investment_amount', 15, 2)->default(0);
            $table->decimal('max_investment_amount', 15, 2)->nullable();
            $table->decimal('interest_rate', 5, 2)->default(0); // e.g., 8.5%
            $table->integer('investment_period')->nullable(); // In months or days
            $table->string('payout_frequency')->default('at_maturity'); // monthly, quarterly, annually, or at maturity       
            $table->boolean('status')->default(true); // active/inactive
            $table->unsignedBigInteger('business_id'); // For multi-tenancy
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
        Schema::create('investment_products', function (Blueprint $table) {
            //
        });
    }
}
