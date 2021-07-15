<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy extends BasePolicy
{
    /**
     * Determine whether the user can view any model.
     * @param User $user
     * @return bool
     */
    public function index(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create model.
     * @param User $user
     * @return bool
     */
    public function store(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the single model.
     * @param User $user
     * @param User $model
     * @return bool
     */
    public function view(User $user, User $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can edit the model.
     * @param User $user
     * @param User $model
     * @return bool
     */
    public function update(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     * @param User $user
     * @param User $model
     * @return bool
     */
    public function destroy(User $user, User $model): bool
    {
        return false;
    }
}
