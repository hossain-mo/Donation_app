<?php

use Illuminate\Database\Seeder;

class UserTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('user_types')->insert([
            ['id' => 1,'name' => 'admin' , 'created_by' => 1, 'updated_by' => 1],
            ['id' => 2,'name' => 'doner' , 'created_by' => 1, 'updated_by' => 1],
        ]);

    }
}
