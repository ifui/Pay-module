<?php

namespace Modules\Pay\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\AdminAuth\Entities\AdminUser;
use Modules\Pay\Enums\PayPermission;

class PayFapiaoPolicy
{
    use HandlesAuthorization;

    public function viewAny(AdminUser $user)
    {
        return $user->can(PayPermission::fapiaoView());
    }

    public function view(AdminUser $user)
    {
        return $user->can(PayPermission::fapiaoView());
    }

    public function create(AdminUser $user)
    {
        return $user->can(PayPermission::fapiaoCreate());
    }

    public function update(AdminUser $user)
    {
        return $user->can(PayPermission::fapiaoUpdate());
    }

    public function delete(AdminUser $user)
    {
        return $user->can(PayPermission::fapiaoDelete());
    }
}
