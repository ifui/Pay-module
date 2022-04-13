<?php

namespace Modules\Pay\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PayFapiao extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'pay_fapiaoable_id',
        'pay_fapiaoable_type'
    ];

    protected static function newFactory()
    {
        return \Modules\Pay\Database\factories\PayFapiaoFactory::new();
    }

    /**
     * 多态一对一
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function pay_fapiaoable()
    {
        return $this->morphTo();
    }
}
