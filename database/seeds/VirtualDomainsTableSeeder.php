<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VirtualDomainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
	DB::table('virtual_domains')->insert([
		'name' => 'schoeneweide.tk'
	]);

	DB::table('virtual_domains')->insert([
		'name' => 'dada-hoelz.tk'
	]);

	DB::table('virtual_domains')->insert([
		'name' => 'dada-hoelz.eu'
	]);

    }
}
