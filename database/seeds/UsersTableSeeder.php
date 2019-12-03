<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name' => 'admin',
            'email' => 'Admin@donation.com',
            'password' => '1234567890',
            'user_type_id' => 1

    ];
    $role = Role::create(['guard_name' => 'web', 'name' => 'SuperAdmin']);
    $role->givePermissionTo(Permission::get()->pluck('id'));
    $user = User::create($user);
    $user->assignRole('SuperAdmin');
    }
}
