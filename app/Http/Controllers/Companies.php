<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/* Class for working with the Companies tab */
class Companies extends Controller
{
	/* List all companies */
    public function index()
	{
		$companies = $this->listCompanies();
			
		return view('companies.listCompanies', ['companies' => $companies]);
	}
	
	/* Adding a new company */	
	public function addcompany(Request $company)
	{	
		$data = ['name' => $company->input('name'),
				'quota' =>$company->input('quota')*1099511531399,
				'create_at' => time()];
	
		DB::table('companies')->insert([$data]);

		$companies = $this->listCompanies();
			
		return view('companies.listCompaniesUpd', ['companies' => $companies]);
			
	}
	
	/* Selection of a list of companies and processing before showing on the page */
	private function listCompanies()
	{
		$companies = DB::table('companies')->orderBy('create_at','desc')
										   ->get();
		
		foreach($companies as $company){
			$quota = ($company->quota/1099511531399);
			$company->quota = ($quota > 1 ?  round($quota,2).'TB' : round(($quota*1024)).' GB');
		}
			
		return $companies;
	}
}		

