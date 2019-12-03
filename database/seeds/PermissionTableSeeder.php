<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('permissions')->delete();
        \DB::table('permissions')->insert([
            ['name' => 'create_users' , 'guard_name' => 'web'],
            ['name' => 'read_users'   , 'guard_name' => 'web'],
            ['name' => 'update_users' , 'guard_name' => 'web'],
            ['name' => 'delete_users' , 'guard_name' => 'web'],
            ['name' => 'create_roles' , 'guard_name' => 'web'],
            ['name' => 'read_roles'   , 'guard_name' => 'web'],
            ['name' => 'update_roles' , 'guard_name' => 'web'],
            ['name' => 'delete_roles' , 'guard_name' => 'web'],
            ['name' => 'create_countries' , 'guard_name' => 'web'],
            ['name' => 'read_countries'   , 'guard_name' => 'web'],
            ['name' => 'update_countries' , 'guard_name' => 'web'],
            ['name' => 'delete_countries' , 'guard_name' => 'web'],
            ['name' => 'create_villages' , 'guard_name' => 'web'],
            ['name' => 'read_villages'   , 'guard_name' => 'web'],
            ['name' => 'update_villages' , 'guard_name' => 'web'],
            ['name' => 'delete_villages' , 'guard_name' => 'web'],
            ['name' => 'create_project_categories' , 'guard_name' => 'web'],
            ['name' => 'read_project_categories'   , 'guard_name' => 'web'],
            ['name' => 'update_project_categories' , 'guard_name' => 'web'],
            ['name' => 'delete_project_categories' , 'guard_name' => 'web'],
            ['name' => 'create_projects' , 'guard_name' => 'web'],
            ['name' => 'read_projects'   , 'guard_name' => 'web'],
            ['name' => 'update_projects' , 'guard_name' => 'web'],
            ['name' => 'delete_projects' , 'guard_name' => 'web'],
            ['name' => 'read_donations'   , 'guard_name' => 'web'],
            ['name' => 'create_project_assets' , 'guard_name' => 'web'],
            ['name' => 'read_project_assets'   , 'guard_name' => 'web'],
            ['name' => 'update_project_assets' , 'guard_name' => 'web'],
            ['name' => 'delete_project_assets' , 'guard_name' => 'web'],

        ]);
    }
}
