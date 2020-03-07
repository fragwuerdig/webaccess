<?php

namespace webaccess\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    
    public function users()
    {
		$users = \webaccess\VirtualUser::all();
		$domains = \webaccess\VirtualDomain::all();
		//return $users;
		return view('users')->with('users', $users)->with('domains', $domains);
	}
	
	public function users_delete($id)
	{
		
		$user = \webaccess\VirtualUser::find($id);
		$user->delete();
		return redirect()->route('users');
		
	}
	
	public function users_create(Request $request)
	{
		$post = $request->all();
		
		$domain = \webaccess\VirtualDomain::where('name', $post['domain'])->first();
		
		$user =  new \webaccess\VirtualUser;
		$user->email = $post['name'] . "@" . $post['domain'];
		$user->domain = $domain->id;
		$user->password = bcrypt($post['password']);
		$user->save();
		
		return redirect()->route('users');
		
	}
	
	public function users_passwd(Request $request, $id)
	{
		
		$post = $request->all();
		$password = $post['password'];
		$password = bcrypt($password);
		
		$user = \webaccess\VirtualUser::find($id);
		$user->password = $password;
		$user->save();
		
		return redirect()->route('users');
		
	}
	
	public function aliases()
    {
		
		$domains = \webaccess\VirtualDomain::all();
		$aliases = \webaccess\VirtualAlias::all();
		foreach ($aliases as $alias){
			$alias->destination = explode(',', $alias->destination);
		}
		return view('aliases')->with(['aliases' => $aliases])->with('domains', $domains);
	}
	
	public function aliases_add(Request $request)
	{
		
		$post = $request->all();
		$domain = $post['domain'];
		$source = $post['source'];
		$destination = $post['destination'];
		$existing_alias = \webaccess\VirtualAlias::where('source', $source . "@" . $domain)->get();
		$domain = \webaccess\VirtualDomain::where('name', $domain)->first();

		if ($existing_alias->isEmpty()) {
			$alias = new \webaccess\VirtualAlias;
			$alias->domain = $domain->id;
			$alias->source = $source . "@" . $domain->name;
			$alias->destination = $destination;
		} else {
			$alias = $existing_alias->first();
			$alias->destination = $alias->destination . "," . $destination;
		}
			
		$alias->save();
		return redirect()->route('aliases');
		
	}
	
	public function logout(Request $request)
	{
		
		Auth::logout($request);
		return redirect()->route('home');
	
	}
}

