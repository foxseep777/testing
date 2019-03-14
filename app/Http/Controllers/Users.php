<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Users extends Controller
{
	public function index()
    {
    	$users	   = $this->listUsers();
		$companies = $this->listCompanies();	
			
		return view('users.listUsers', ['users' => $users, 'companies' => $companies]);
	}

	public function adduser(Request $user)
    {	
		$data = ['user_name' => $user->input('name'),
				'id_company' =>$user->input('company'),
				'email' => $user->input('email'),
				'create_at' => time()];
	
		DB::table('users')->insert([$data]);
	
		$users	   = $this->listUsers();
			
		return view('users.listUsersUpd', ['users' => $users]);
	}
	
	private function listUsers()
	{
			$users = DB::table('users')

			->join('companies', 'users.id_company', '=', 'companies.id')
			->select('users.*', 'companies.name')
			->orderBy('create_at','desc')
            ->get();
			
			return $users;
	}

	private function listCompanies()
	{
			$companies = DB::table('companies')->select('companies.id','companies.name')->get();	
			
			return $companies;
	}
	
}		
