<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToLoanRepaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     /**
      * the items that should get into the database here are as follows
      * Loan Id
      * Paid Amount
      * Date paid
      * Collected by
      * Means of payment (Cash, bank, transfer)
      * Customer ID or Customer name
      * 
      */
    public function up()
    {
        Schema::table('loan_repayments', function (Blueprint $table) {
            $table->unsignedBigInteger('loan_id');
            $table->foreign('loan_id')->on('loans')->references('id')->onDelete('cascade');
            $table->string('business_id');
            $table->decimal('paid_amount', 15, 2);
            $table->date('paid_date');
            $table->string('collected_by');
            $table->string('payment_means');
            $table->string('customer_id');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('loan_repayments', function (Blueprint $table) {
            $table->dropColumn('loan_id');            
            $table->dropColumn('business_id');
            $table->dropColumn('paid_amount', 15, 2);
            $table->dropColumn('paid_date');
            $table->dropColumn('collected_by');
            $table->dropColumn('payment_means');
            $table->dropColumn('customer_id');
        });
    }
}
