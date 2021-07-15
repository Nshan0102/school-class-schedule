<?php

namespace App\Services;

class PermissionsService
{
    public function allRolesAndPermissionsStatics()
    {
        return config('permission_list');
    }
}
