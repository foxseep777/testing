<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/* Class for working with the Users tab */
class Users extends Controller
{
	/* List all users */
	public function index()
	{

    	$users	   = $this->listUsers();
		$companies = $this->listCompanies();	
			
		return view('users.listUsers', ['users' => $users, 'companies' => $companies]);
	}
	
	/* Adding a new user */	
	public function adduser(Request $user)
	{	
		$data = ['user_name' => $user->input('name'),
				'id_company' =>$user->input('company'),
				'email' => $user->input('email'),
				'create_at' => time()];
	
		DB::table('users_comp')->insert([$data]);
	
		$users	= $this->listUsers();
			
		return view('users.listUsersUpd', ['users' => $users]);
	}
	
	/* Selection of a list of users  before showing on the page */
	private function listUsers()
	{
		$users = DB::table('users_comp')

			->join('companies', 'users_comp.id_company', '=', 'companies.id')
			->select('users_comp.*', 'companies.name')
			->orderBy('create_at','desc')
            ->get();
			
		return $users;
	}
	
	/* Selection of the user's company from the database */
	private function listCompanies()
	{
		$companies = DB::table('companies')->select('companies.id','companies.name')->get();	
			
		return $companies;
	}
	
}		
