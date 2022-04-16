<?php

namespace Modules\Pay\Enums;

class PayType
{
  /**
   * 线下交易
   */
  const OFFLINE = 'offline';

  /**
   * 支付宝交易
   */
  const ALIPAY = 'alipay';

  /**
   * 微信交易
   */
  const WEIXIN = 'weixin';

  /**
   * 其他方式
   */
  const OTHER = 'other';
}
