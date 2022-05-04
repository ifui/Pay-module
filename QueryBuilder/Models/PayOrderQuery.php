<?php

namespace Modules\Pay\QueryBuilder\Models;

use App\Interfaces\QueryBuilderBase;
use Spatie\QueryBuilder\AllowedFilter;

class PayOrderQuery implements QueryBuilderBase
{
    public static function include(): array
    {
        return [
            'pay_orderable',
            'fapiao',
        ];
    }

    public static function append(): array
    {
        return [];
    }

    public static function field(): array
    {
        return [];
    }

    public static function filter(): array
    {
        return [
            AllowedFilter::exact('id'),
            AllowedFilter::exact('status'),
            AllowedFilter::exact('pay_orderable_type'),
            'order_number',
            'price',
            'pay_time',
            'pay_type',
            'remark',
            'pay_orderable_id',
        ];
    }

    public static function sort()
    {
        return ['updated_at', 'created_at', 'id', 'status', 'price', 'pay_time'];
    }
}
