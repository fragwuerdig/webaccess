<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
	
    $this->comment(Inspiring::quote());
    
})->describe('Display an inspiring quote');

Artisan::command('webuser:add', function() {
	
	$username = $this->ask('Username?');
	$password = $this->secret('Password?');
	$retype = $this->secret('Password again?');
	if ($password === $retype){
		$user = new \App\User;
		$user->name = $username;
		$user->email = '';
		$user->password = bcrypt($password);
		$user->save();
	}
	else{
		$this->error('whoops!');
	}
	
});

Artisan::command('webuser:del {user}', function($user) {
	
	$result  = \App\User::where('name', $user)->first();
	if (empty($result)) {
		$this->error('No such user existent');
	}
	//$password = $this->ask('Password?');
	//User::create([
            //'name' => $username,
            //'email' => $data['email'],
            //'password' => bcrypt($data['password']),
        //]);
    //}
	//$this->info($password);
	
});
