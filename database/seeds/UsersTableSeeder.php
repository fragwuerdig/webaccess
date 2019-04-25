<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
	DB::table('users')->insert([
		'name' => 'till',
		'email' => 'tz@schoeneweide.tk',
		'password' => bcrypt('t1ll')
	]);

	DB::table('users')->insert([
		'name' => 'root',
		'email' => 'root@schoeneweide.tk',
		'password' => bcrypt('r00t_01')
	]);

    }
}
