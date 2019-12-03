<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Dashboard',
                'class' => 'flaticon-line-graph',
                'permission' => NULL,
                'route' => '/admin/dashboard',
                'parent' => NULL,
                'order' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Users',
                'class' => 'flaticon-users-1',
                'permission' => NULL,
                'route' => '#',
                'parent' => 0,
                'order' => 2,
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Users Litings',
                'class' => 'm-menu__link-bullet--dot',
                'permission' => 'read_users',
                'route' => '/admin/users-view',
                'parent' => 2,
                'order' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Roles Liting',
                'class' => 'm-menu__link-bullet--dot',
                'permission' => 'read_roles',
                'route' => '/admin/roles-view',
                'parent' => 2,
                'order' => 2,
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Countries',
                'class' => 'flaticon-users-1',
                'permission' => NULL,
                'route' => '#',
                'parent' => 0,
                'order' => 2,
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'Countries Listing',
                'class' => 'm-menu__link-bullet--dot',
                'permission' => 'read_countries',
                'route' => '/admin/countries-view',
                'parent' => 5,
                'order' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'title' => 'Villages',
                'class' => 'flaticon-users-1',
                'permission' => NULL,
                'route' => '#',
                'parent' => 0,
                'order' => 3,
            ),
            7 => 
            array (
                'id' => 8,
                'title' => 'Villages Listing',
                'class' => 'm-menu__link-bullet--dot',
                'permission' => 'read_villages',
                'route' => '/admin/villages-view',
                'parent' => 7,
                'order' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'title' => 'Projects Categories',
                'class' => 'flaticon-users-1',
                'permission' => NULL,
                'route' => '#',
                'parent' => 0,
                'order' => 4,
            ),
            9 => 
            array (
                'id' => 10,
                'title' => 'Projects Categories Liting',
                'class' => 'm-menu__link-bullet--dot',
                'permission' => 'read_project_categories',
                'route' => '/admin/project-categories-view',
                'parent' => 9,
                'order' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'title' => 'Projects',
                'class' => 'flaticon-users-1',
                'permission' => NULL,
                'route' => '#',
                'parent' => 0,
                'order' => 5,
            ),
            11 => 
            array (
                'id' => 12,
                'title' => 'Projects Listing',
                'class' => 'm-menu__link-bullet--dot',
                'permission' => 'read_projects',
                'route' => '/admin/projects-view',
                'parent' => 11,
                'order' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'title' => 'Donations',
                'class' => 'flaticon-users-1',
                'permission' => NULL,
                'route' => '#',
                'parent' => 0,
                'order' => 6,
            ),
            13 => 
            array (
                'id' => 14,
                'title' => 'Donations Listing',
                'class' => 'm-menu__link-bullet--dot',
                'permission' => 'read_donations',
                'route' => '/admin/projects-donation-view',
                'parent' => 13,
                'order' => 1,
            ),
            14 => 
            array (
                'id' => 14,
                'title' => 'Project Assets',
                'class' => 'flaticon-users-1',
                'permission' => NULL,
                'route' => '#',
                'parent' => 0,
                'order' => 7,
            ),
            15 => 
            array (
                'id' => 15,
                'title' => 'Project Assets',
                'class' => 'm-menu__link-bullet--dot',
                'permission' => 'read_project_assets',
                'route' => '/admin/projects-asstes-view',
                'parent' => 14,
                'order' => 1,
            ),
        ));
        
        
    }
}