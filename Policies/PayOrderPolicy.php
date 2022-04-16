<?php

namespace Modules\Pay\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Pay\Entities\PayOrder;
use Modules\UserKjj\Entities\User;

class PayOrderPolicy
{
    use HandlesAuthorization;

    /**
     * 只有本人才有权限操作
     * 
     * @param User $user
     * @param PayOrder $modek
     * @return boolean
     */
    public function isOwner(User $user, PayOrder $model)
    {
        return $user->id == $model->pay_orderable['user_id'];
    }
}
