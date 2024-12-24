<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSavingsProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('savings_products', function (Blueprint $table) {
            $table->string('product_code')->unique();
            $table->text('description')->nullable();
            $table->decimal('min_deposit', 15, 2)->default(0);
            $table->decimal('max_deposit', 15, 2)->nullable();
            $table->decimal('interest_rate', 5, 2)->default(0); // e.g., 5.25%        
            $table->integer('duration')->nullable(); // In months or days
            $table->decimal('target_amount', 15, 2)->nullable();
            $table->decimal('maximum_withdrawal_amount', 15, 2)->nullable();
            $table->decimal('opening_fee', 15, 2)->default(0);
            $table->decimal('maintenance_fee', 15, 2)->default(0);            
            $table->boolean('status')->default(true);
            
        });
    }
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('savings_products', function (Blueprint $table) {
            //
        });
    }
}
