<?php

namespace Modules\Pay\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\AdminAuth\Entities\AdminUser;
use Modules\Pay\Entities\PayOrder;
use Modules\Pay\Enums\PayPermission;
use Modules\UserKjj\Entities\User;

class PayOrderPolicy
{
    use HandlesAuthorization;

    public function viewAny(AdminUser $user): bool
    {
        return $user->can(PayPermission::orderView());
    }

    public function view(AdminUser $user): bool
    {
        return $user->can(PayPermission::orderView());
    }

    public function create(AdminUser $user): bool
    {
        // return $user->can(PayPermission::orderCreate());
    }

    public function update(AdminUser $user): bool
    {
        return $user->can(PayPermission::orderUpdate());
    }

    public function delete(AdminUser $user): bool
    {
        return $user->can(PayPermission::orderDelete());
    }

    /**
     * 只有本人才有权限操作
     *
     * @param User $user
     * @param PayOrder $model
     * @return boolean
     */
    public function isOwner(User $user, PayOrder $model): bool
    {
        return $user->id == $model->pay_orderable['user_id'];
    }
}
