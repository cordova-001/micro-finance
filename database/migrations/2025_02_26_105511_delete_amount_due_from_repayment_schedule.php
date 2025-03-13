<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteAmountDueFromRepaymentSchedule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('repayment_schedules', function (Blueprint $table) {
            $table->dropColumn('amount_due');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('repayment_schedules', function (Blueprint $table) {
            $table->decimal('amount_due', 20, 2);
        });
    }
}
