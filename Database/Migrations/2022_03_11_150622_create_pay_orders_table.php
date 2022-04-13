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
        Schema::create('pay_orders', function (Blueprint $table) {
            $table->id();

            $table->string('order_number', 64)->comment('订单号，长度不能超过64位');

            $table->decimal('price', 10, 2)->comment('价格');
            $table->tinyInteger('status')->default(0)->comment('订单状态: -2:退款; -1:支付失败; 0:未支付; 99:已支付');

            $table->unsignedBigInteger('pay_orderable_id')->comment('关联表ID');
            $table->string('pay_orderable_type', 350)->comment('关联表模型');

            $table->dateTime('pay_time')->comment('支付时间')->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('pay_orders');
    }
};
