<?php

namespace Modules\Pay\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Pay\Entities\PayOrder;
use Psr\Http\Message\ResponseInterface;
use Yansongda\Pay\Exception\ContainerException;
use Yansongda\Pay\Exception\InvalidParamsException;
use Yansongda\Pay\Exception\ServiceNotFoundException;
use Yansongda\Pay\Pay;

class AlipayController extends Controller
{
    /**
     * 支付宝查询订单是否支付完成接口
     *
     * @param string $id
     * @return JsonResponse
     * @throws ContainerException
     * @throws InvalidParamsException
     * @throws ServiceNotFoundException
     */
    public function check($id)
    {
        $result = Pay::alipay()->find([
            'out_trade_no' => $id,
        ]);

        if ($result->code == 10000) {

            $model = PayOrder::where('order_number', $result->out_trade_no)->first();
            if ($model->status !== 1) {
                $model->status = 1;
                $model->save();
            }

            return success();
        }

        return error($result->sub_msg);
    }

    /**
     * 接收阿里回调方法
     * 确认交易是否成功
     *
     * @return JsonResponse|ResponseInterface
     * @throws ContainerException
     * @throws InvalidParamsException
     */
    public function callback()
    {
        $result = Pay::alipay()->callback();

        $model = PayOrder::where('order_number', $result->out_trade_no)->first();

        if (!$model) {
            return error('code.10404');
        }

        $app_id = config('pay.alipay.default.app_id');
        $price = (string)$model->price;

        // 对请求结果进行校验，不正确直接返回
        if ($result->total_amount !== $price or $result->app_id !== $app_id) {
            return Pay::alipay()->success();
        }

        $model->status = 1;
        $model->save();

        return Pay::alipay()->success();
    }
}
