<?php

namespace Modules\Pay\Http\Requests\Admin;

use App\Http\Requests\MethodRequest;

class OrderRequest extends MethodRequest
{
    public function patchRules(): array
    {
        return [
            'pay_time' => 'date|nullable',
            'pay_type' => '',
            'remark' => '',
            'status' => 'integer|nullable'
        ];
    }
}
