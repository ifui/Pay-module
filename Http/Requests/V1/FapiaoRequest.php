<?php

namespace Modules\Pay\Http\Requests\V1;

use App\Http\Requests\MethodRequest;

class FapiaoRequest extends MethodRequest
{
    // 默认公用规则
    protected $defaultRules = [
        'company_address' => '',
        'phone' => '',
        'opening_bank' => '',
        'bank_account' => '',
    ];

    public function postRules()
    {
        return [
            'header' => ['required'],
            'tax_num' => ['required'],
            'pay_order_id' => ['required', 'exists:pay_orders,id'],
        ];
    }

    public function patchRules()
    {
        return [
            'header' => '',
            'tax_num' => ''
        ];
    }

    public function messages()
    {
        return [
            'header.required' => '发票抬头不能为空',
            'tax_num.required' => '税号不能为空',
            'pay_order_id.required' => '订单ID不能为空',
            'pay_order_id.exists' => '该订单不存在',
        ];
    }
}
