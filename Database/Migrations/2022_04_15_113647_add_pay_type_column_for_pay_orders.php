<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pay_orders', function (Blueprint $table) {
            $table->string('pay_type')->default('')->comment('支付类型');
            $table->string('remark')->comment('备注')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pay_orders', function (Blueprint $table) {
            $table->dropColumn('pay_type');
            $table->dropColumn('remark');
        });
    }
};
