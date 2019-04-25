<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VirtualUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
	DB::table('virtual_users')->insert([
		'domain' => '1',
		'email' => 'ziegler@schoeneweide.tk',
		'password' => bcrypt('password')
	]);

	DB::table('virtual_users')->insert([
		'domain' => '3',
		'email' => 'ls@dada-hoelz.eu',
		'password' => bcrypt('password')
	]);

	DB::table('virtual_users')->insert([
		'domain' => '2',
		'email' => 'amazon@dada-hoelz.tk',
		'password' => bcrypt('password')
	]);

	DB::table('virtual_users')->insert([
		'domain' => '3',
		'email' => 'admin@dada-hoelz.eu',
		'password' => bcrypt('password')
	]);

    }
}
