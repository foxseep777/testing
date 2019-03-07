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
			
		return view('listUsers', ['users' => $users, 'companies' => $companies]);
	}

	public function adduser()
    {	
		$user = $_POST;
		$data = ['user_name' => $user['name'],
				'id_company' =>$user['company'],
				'email' => $user['email'],
				'create_at' => time()];
	
		DB::table('users')->insert([$data]);
	
		$users	   = $this->listUsers();
			
		return view('listUsersUpd', ['users' => $users]);
	}
	
	private function listUsers()
	{
			$users = DB::table('users')
		/*	->join('companies', function($join)
			{
				$join->on('users.id_company', '=','companies.id')->select('users.*', 'contacts.phone', 'orders.price');
			})*/
			->join('companies', 'users.id_company', '=', 'companies.id')
			->select('users.*', 'companies.name')
			->orderBy('create_at','desc')
            ->get();
			/*
			->get();*/
			
			return $users;
	}

	private function listCompanies()
	{
			$companies = DB::table('companies')->select('companies.id','companies.name')->get();	
			
			return $companies;
	}
	
}		
