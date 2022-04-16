<?php

namespace Modules\Pay\QueryBuilder\Models;

use App\Interfaces\QueryBuilderBase;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Database\Eloquent\Builder;

class PayFapiaoQuery implements QueryBuilderBase
{
  public static function include()
  {
    return [
      'pay_order',
      'pay_order.pay_orderable',
    ];
  }

  public static function append()
  {
    return [];
  }

  public static function field()
  {
    return [];
  }

  public static function filter()
  {
    return [
      AllowedFilter::exact('id'),
      'header',
      'tax_num',
      'opening_bank',
      'bank_account',
      'phone',

      AllowedFilter::callback(
        'status',
        fn (Builder $query, $value) => $value ? $query->where('file', '<>', null) : $query->where('file', null)
      ),
    ];
  }

  public static function sort()
  {
    return ['updated_at', 'created_at', 'id'];
  }
}
