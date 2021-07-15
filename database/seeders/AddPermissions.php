<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Services\PermissionsService;
use Illuminate\Database\Seeder;

class AddPermissions extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $permission_service = new PermissionsService();
        $all_roles = $permission_service->allRolesAndPermissionsStatics();
        foreach ($all_roles as $role_name => $role) {
            $userRole = Role::firstOrCreate(['name' => $role_name]);
            foreach ($role['permissions'] as $key => $permission) {
                $permission = Permission::firstOrCreate(['name' => $key]);
                $userRole->givePermissionTo($permission->name);
            }
        }
    }
}
