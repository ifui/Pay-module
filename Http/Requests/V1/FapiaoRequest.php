<?php

namespace Modules\Pay\Http\Requests\V1;

use App\Http\Requests\MethodRequest;
use Illuminate\Validation\Rule;

class FapiaoRequest extends MethodRequest
{
    // 默认公用规则
    protected $defaultRules = [
        'company_address',
        'phone',
        'opening_bank',
        'bank_account',
    ];

    public function postRules()
    {
        $accept_types = array_keys(config('pay.fapiao_accept_types', []));
        return [
            'header' => ['required'],
            'tax_num' => ['required'],
            'type_id' => ['required', 'numeric'],
            'type' => ['required', Rule::in($accept_types)],
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
            'type_id.required' => '类型ID不能为空',
            'type_id.numeric' => '类型ID必须为数字',
            'type.required' => '类型不能为空',
        ];
    }
}
