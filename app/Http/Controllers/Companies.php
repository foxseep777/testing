<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Companies extends Controller
{
    public function index()
      {
		$companies = $this->listCompanies();
			
		return view('companies.listCompanies', ['companies' => $companies]);
	}
		
	public function addcompany()
    {	
		$company = $_POST;
			
		$data = ['name' => $company['name'],
				'quota' =>$company['quota']*1099511531399,
				'create_at' => time()];
	
		DB::table('companies')->insert([$data]);

		$companies = $this->listCompanies();
			
		return view('companies.listCompaniesUpd', ['companies' => $companies]);
			
	}
	
	private function listCompanies()
	{
		$companies = DB::table('companies')->orderBy('create_at','desc')
										   ->get();
		
		foreach($companies as $company)
		{
			$quota = ($company->quota/1099511531399);
			$company->quota = ($quota > 1 ?  round($quota,2).'TB' : round(($quota*1024)).' GB');
		}
			
		return $companies;
	}
}		

