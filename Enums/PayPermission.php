<?php

namespace Modules\Pay\Enums;

/**
 * 支付模块权限枚举类
 * 
 */
class PayPermission
{
  /**
   * 是否具有查看订单的权限
   *
   * @return void
   */
  public static function orderView()
  {
    return config('pay.permissions.pay order view');
  }

  /**
   * 是否具有更新订单的权限
   *
   * @return void
   */
  public static function orderUpdate()
  {
    return config('pay.permissions.pay order update');
  }

  /**
   * 是否具有删除订单的权限
   *
   * @return void
   */
  public static function orderDelete()
  {
    return config('pay.permissions.pay order delete');
  }

  /**
   * 是否具有查看发票的权限
   *
   * @return void
   */
  public static function fapiaoView()
  {
    return config('pay.permissions.pay fapiao view');
  }

  /**
   * 是否具有创建发票的权限
   *
   * @return void
   */
  public static function fapiaoCreate()
  {
    return config('pay.permissions.pay fapiao create');
  }

  /**
   * 是否具有更新发票的权限
   *
   * @return void
   */
  public static function fapiaoUpdate()
  {
    return config('pay.permissions.pay fapiao update');
  }

  /**
   * 是否具有删除发票的权限
   *
   * @return void
   */
  public static function fapiaoDelete()
  {
    return config('pay.permissions.pay fapiao delete');
  }
}
