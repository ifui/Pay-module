<?php

namespace Modules\Pay\QueryBuilder\Models;

use App\Interfaces\QueryBuilderBase;
use Spatie\QueryBuilder\AllowedFilter;

class PayFapiaoQuery implements QueryBuilderBase
{
  public static function include()
  {
    return [];
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
      'name',
      'content',
      'rooms',
      'thumb',
      'phone',
      'contact',

      'address',
    ];
  }

  public static function sort()
  {
    return ['updated_at', 'created_at', 'id'];
  }
}
