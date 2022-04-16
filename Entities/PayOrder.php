<?php

namespace Modules\Pay\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class PayOrder extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();
        // 订单创建时
        static::creating(function ($model) {
            // 生成订单号
            $model->order_number = date('Ymd') . str_pad(mt_rand(1, 9999), 5, '0', STR_PAD_LEFT);
        });
    }


    protected static function newFactory()
    {
        return \Modules\Pay\Database\factories\PayOrderFactory::new();
    }

    /**
     * 多态一对一
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function pay_orderable()
    {
        return $this->morphTo();
    }

    /**
     * 一对一关联
     * 发票
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fapiao()
    {
        return $this->hasOne(PayFapiao::class);
    }
}
