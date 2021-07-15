<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;

abstract class BasePolicy
{
    /**
     * @return User|Authenticatable|null
     */
    public function user(): ?User
    {
        return auth()->user();
    }
}
