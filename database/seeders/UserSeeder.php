<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\UserRepository;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        UserFactory::times(50)->create();
        /** @var UserRepository $userRepository */
        $userRepository = app(UserRepositoryInterface::class);
        $admins = $userRepository->newQuery()->limit(5)->get();
        $role = Role::findByName('admin');
        $role->users()->attach($admins);
    }
}
