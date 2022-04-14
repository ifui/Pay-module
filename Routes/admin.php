<?php


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

use Modules\Pay\Http\Controllers\Admin\FapiaoController;

$v1_prefix = 'v1/pay';


Route::prefix($v1_prefix)->group(function () {
  // 支付宝查询订单
  Route::resource('/fapiaos', FapiaoController::class);
});
