<?php

namespace App\Policies;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Auth\User;

class OrderPolicy
{

    public function create(?User $user,Customer $customer)
    {
        return $customer->status == 'normal' ? Response::allow() : Response::deny(['Customer is Blocked.']);
    }

}
