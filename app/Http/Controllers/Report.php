<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/* Report generation class */
class Report extends Controller
{
	/* Generates a list of months on the Abusers page */
	public function index(){
		$min = (DB::table('transfer')->min('date'));
		
		if($min != Null){
			
			$minDate = date('F-Y',$min);
			for($x = 0; $x < 7; $x++){
				$key =  date('F',strtotime( "$minDate +$x month" ));
				$interval[$key] =  date('Y',strtotime( "$minDate +$x month" ));
				
			}
		}else{
			$interval = array();
		}
		
		return view('abusers.abusers',['min' => $interval]);
	}

	/* Generating and writing data to the 'transfer' table */
    public function generateData()
	{
						
		$transfer = DB::table('users_comp')->get();
		$faker = \Faker\Factory::create();
		$now = time();
		$intTotal = 6;
		$listUsed = array();

		DB::table('transfer')->truncate();
			
		$interval = $now - 15552000;
		$intMonth = $interval;
		for($i=0; $i <= 180; $i++){
			foreach($transfer as $user){
				$resp = $this->transferAdd($user,$intMonth,$faker);
				if($resp != Null){
					$listUsed[] = $resp;
				}
			}
			$intMonth = $intMonth + 86400;
		}

		DB::table('transfer')->insert($listUsed);
				
		$checkField =	DB::table('users_comp')->whereNotExists(function ($query){
											$query->select(DB::raw(1))
												->from('transfer')
												->whereRaw("transfer.user_id =users_comp.id");
												})->get();

		foreach($checkField as $key=>$user){
			$this->transferAdd($user,$interval,$faker,9,1);
		}
					
		return back()->withInput();
	}	

	/* Formation of the list of companies that exceeded the quota */
	public function report(Request $request)
	{
	
		$month = (Null != $request->input('month')) ? (filter_var($request->input('month'), FILTER_SANITIZE_URL)) : '';
		
		$monthArr = $this->monthInterval($month);
		
		$startDate = $monthArr['startDate'];	
		$finalDate = $monthArr['finalDate'];

		$abusers = array();	
				
		$transfer = DB::table('users_comp')
					->join('companies', function($join)
					{
						$join->on('users_comp.id_company', '=','companies.id')->select('users_comp.id', 'users_comp.user_name', 'companies.name');;
					})
					->get();

		$transfer = \DB::table('users_comp')->get();
		$companyQuota = \DB::table('companies')->get();
			
		foreach($companyQuota as $quota){
			$used = 0;
			$abUser = array();
			foreach($transfer as $user){
				$users = DB::table('transfer')->where('user_id', '=', $user->id)
											  ->where('company_id', '=', $quota->id)
											  ->where('date', '>', $startDate)
											  ->where('date', '<', $finalDate)
											  ->sum('transfer');
				if($users > 0){
					$used += $users;
				}				
			}	
			if($quota->quota < $used){
				$quota->limit = $used/1099511531399;
				$quota->limit = ($quota->limit > 1 ?  round($quota->limit,2).' TB' : round(($quota->limit*1024)).' GB');
				$quota->quota =$quota->quota/1099511531399;
				$quota->quota = ($quota->quota > 1 ?  round($quota->quota,2).' TB' : round(($quota->quota*1024)).' GB');
				$quota->month = $month;
				$abCompany['company'][$quota->name] = $quota;
						
			}	
		}
		
		if(isset($abCompany))
		{
			$abComp = $this->sortArray($abCompany['company']);
			
			return $this->reportListCompanies($abComp);
		}
				
	}	
		
	/* Generating an array with data for one record in the 'transfer' table */
	private function transferAdd($user, $interval, $faker, $randCheck = Null, $rand = NULL)
	{
		$randCheck = ($randCheck == NULL ? rand(0,20) : $randCheck);
		if($randCheck > 0){
			$rand = ($rand == NULL ? rand(0,6) : $rand);
						
			for($j = 0; $j < $rand; $j++){
				$data = ['user_id' => $user->id,
						 'company_id' =>$user->id_company,
					     'resource' => "http://{$faker->ipv4()}",
						 'date' => rand($interval,$interval + 86400),
						 'transfer' => rand(100,1099511531399)];
			}			
		}
		if(isset($data)){
			return $data;
		}		
	}
	
	/* The function of sorting a two-dimensional array by the key limit */	
	private function sortArray($array)
	{
		foreach($array as $k=>$val){
			$sortkey[$array[$k]->limit]=$array[$k];
		}
	
		krsort($sortkey);
		
		return $sortkey;
	}
	
	/*Replacing the key with the name of the company and displaying a list of companies exceeding the quota */
	public function reportListCompanies($list)
	{
		foreach ($list as $key => $val){	
			$abCompany[$val->name]=$val;
		}
		return view('abusers.abUsComp', ['list' => $abCompany]);
	}
	
	/* Formation of the list of abusers */
	public function reportListAbusers(Request $request)
	{
		$month = (Null != $request->input('month')) ? (filter_var($request->input('month'), FILTER_SANITIZE_URL)) : '';
		$id = (Null != $request->input('id')) ? (filter_var($request->input('id'), FILTER_SANITIZE_URL)) : '';
		$monthArr = $this->monthInterval($month);
		
	 	$users = DB::table('transfer')->where('date', '>', $monthArr['startDate'])
									  ->where('company_id', '=', $id)
									  ->where('date', '<', $monthArr['finalDate'])
									  ->join('users_comp', function($join)
									{
										$join->on('users_comp.id', '=','transfer.user_id')->select('users_comp.id', 'users_comp.user_name', 'transfer.resource');

									})
									->orderBy('transfer','desc')
									->get();
		
		$companyName = DB::table('companies') ->where('companies.id','=',$id)
											  ->select('companies.name')
											  ->first();
           					
		foreach($users as $user){
			$user->date = date('j F Y H:m:s',$user->date);
			$user->transfer = $user->transfer/1099511531399;
			$user->transfer = ($user->transfer > 1 ?  round($user->transfer,2).' TB' : round(($user->transfer*1024)).' GB');
		}
	
		return view('abusers.listAbusers',['users' => $users,'companyName' => $companyName]);
	}
	
	/* Find the first and last month in the list on the Abusers page */
	private function monthInterval($month)
	{
		if(!empty($month)){
			$monthNameArr = [
							'January'  => 2678400,
							'February' => 2419200,
							'March'    => 2678400,
							'April'    => 2592000,
							'May'      => 2678400,	
							'June'     => 2592000,
							'July'     => 2678400,
							'August'   => 2678400,
							'September'=> 2592000,
							'October'  => 2678400,
							'November' => 2592000,
							'December' => 2678400
							];
							
			$monthArr['startDate'] = strtotime('01-'.$month);	
			$moutnName = substr($month,0,stripos($month,'-'));
			$monthArr['finalDate'] = $monthArr['startDate'] + $monthNameArr[$moutnName];
		}else{
			$monthArr['startDate'] = 0;	
			$monthArr['finalDate'] = 0;
		}
		
		return $monthArr;
	}
			
}
