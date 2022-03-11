<?php

use Modules\Pay\Http\Controllers\V1\AlipayController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$v1_prefix = 'v1/pay';


Route::prefix($v1_prefix)->group(function () {
  // 支付宝异步回调通知
  Route::any('/alipay/callback', [AlipayController::class, 'callback']);
  // 支付宝查询订单
  Route::get('/alipay/check/{id}', [AlipayController::class, 'check']);
});
