<?php

namespace Modules\Pay\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class PayOrder extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [];

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
}
