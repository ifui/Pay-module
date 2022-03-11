<?php

declare(strict_types=1);

use Yansongda\Pay\Pay;

return [
    'name' => 'Pay',
    'alipay' => [
        /**
         * 支付宝支付注意事项（摘自官方文档）：
         * 
         * • 由于同步返回的不可靠性，支付结果必须以异步通知或查询接口返回为准，不能依赖同步跳转。
         * • 商户系统接收到异步通知以后，必须通过验签（验证通知中的 sign 参数）来确保支付通知是由支付宝发送的。详细验签规则请参见 异步通知验签。
         * • 接收到异步通知并验签通过后，请务必核对通知中的 app_id、out_trade_no、total_amount 等参数值是否与请求中的一致，并根据 trade_status 进行后续业务处理。
         * • 在支付宝端，partnerId 与 out_trade_no 唯一对应一笔单据，商户端保证不同次支付 out_trade_no 不可重复；若重复，支付宝会关联到原单据，基本信息一致的情况下会以原单据为准进行支付。
         */
        'default' => [
            // 必填-支付宝分配的 app_id
            'app_id' => env('ALIPAY_APP_ID', ''),
            // 必填-应用私钥 字符串或路径
            'app_secret_cert' => env('ALIPAY_APP_SECRET_CERT', ''),
            // 必填-应用公钥证书 路径
            'app_public_cert_path' => env('ALIPAY_APP_PUBLIC_CERT_PATH', ''),
            // 必填-支付宝公钥证书 路径
            'alipay_public_cert_path' => env('ALIPAY_PUBLIC_CERT_PATH', ''),
            // 必填-支付宝根证书 路径
            'alipay_root_cert_path' => env('ALIPAY_ROOT_CERT_PATH', ''),
            // 同步返回
            'return_url' => '/api/v1/pay/alipay/return',
            // 异步通知
            'notify_url' => '/api/v1/pay/alipay/notify',
            // 选填-服务商模式下的服务商 id，当 mode 为 Pay::MODE_SERVICE 时使用该参数
            'service_provider_id' => '',
            // 选填-默认为正常模式。可选为： MODE_NORMAL, MODE_SANDBOX, MODE_SERVICE
            'mode' => env('ALIPAY_MODE', Pay::MODE_NORMAL),
        ],
    ],
    'wechat' => [
        'default' => [
            // 必填-商户号，服务商模式下为服务商商户号
            'mch_id' => '',
            // 必填-商户秘钥
            'mch_secret_key' => '',
            // 必填-商户私钥 字符串或路径
            'mch_secret_cert' => '',
            // 必填-商户公钥证书路径
            'mch_public_cert_path' => '',
            // 必填
            'notify_url' => '',
            // 选填-公众号 的 app_id
            'mp_app_id' => '',
            // 选填-小程序 的 app_id
            'mini_app_id' => '',
            // 选填-app 的 app_id
            'app_id' => '',
            // 选填-合单 app_id
            'combine_app_id' => '',
            // 选填-合单商户号 
            'combine_mch_id' => '',
            // 选填-服务商模式下，子公众号 的 app_id
            'sub_mp_app_id' => '',
            // 选填-服务商模式下，子 app 的 app_id
            'sub_app_id' => '',
            // 选填-服务商模式下，子小程序 的 app_id
            'sub_mini_app_id' => '',
            // 选填-服务商模式下，子商户id
            'sub_mch_id' => '',
            // 选填-微信公钥证书路径, optional，强烈建议 php-fpm 模式下配置此参数
            'wechat_public_cert_path' => [
                '45F59D4DABF31918AFCEC556D5D2C6E376675D57' => __DIR__ . '/Cert/wechatPublicKey.crt',
            ],
            // 选填-默认为正常模式。可选为： MODE_NORMAL, MODE_SERVICE
            'mode' => Pay::MODE_NORMAL,
        ],
    ],
    'http' => [ // optional
        'timeout' => 5.0,
        'connect_timeout' => 5.0,
        // 更多配置项请参考 [Guzzle](https://guzzle-cn.readthedocs.io/zh_CN/latest/request-options.html)
    ],
    // optional，默认 warning；日志路径为：sys_get_temp_dir().'/logs/yansongda.pay.log'
    'logger' => [
        'enable' => false,
        'file' => null,
        'level' => 'debug',
        'type' => 'daily', // optional, 可选 daily.
        'max_file' => 30,
    ],
];
