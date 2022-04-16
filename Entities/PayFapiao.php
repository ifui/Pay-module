<?php

namespace Modules\Pay\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PayFapiao extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function newFactory()
    {
        return \Modules\Pay\Database\factories\PayFapiaoFactory::new();
    }

    /**
     * 一对一
     * 关联订单表
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function pay_order()
    {
        return $this->belongsTo(PayOrder::class);
    }
}
