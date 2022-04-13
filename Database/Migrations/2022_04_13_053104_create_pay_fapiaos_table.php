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
        Schema::create('pay_fapiaos', function (Blueprint $table) {
            $table->id();
            $table->string('header')->comment('发票抬头');
            $table->string('tax_num', 20)->comment('税号')->nullable();
            $table->string('company_address')->comment('公司地址')->nullable();
            $table->string('phone')->comment('联系电话')->nullable();
            $table->string('opening_bank')->comment('开户银行')->nullable();
            $table->string('bank_account')->comment('银行账号')->nullable();

            $table->unsignedBigInteger('pay_fapiaoable_id')->comment('关联表ID');
            $table->string('pay_fapiaoable_type', 350)->comment('关联表模型');

            $table->string('file')->comment('文件下载地址')->nullable();
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
        Schema::dropIfExists('pay_fapiaos');
    }
};
