<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Report extends Controller
{

	public function index()
    {
		$min = (DB::table('transfer')->min('date'));
		if($min != Null){
			$minDate = date('F-Y',$min);
			for($x = 0; $x < 7; $x++){
				$key =  date('F',strtotime( "$minDate +$x month" ));
				$interval[$key] =  date('Y',strtotime( "$minDate +$x month" ));
				
			}
		}
		else{
			$interval = array();
		}
		
		return view('abusers',['min' => $interval]);
	}

    public function generateData()
    {
						
			$transfer = DB::table('users')->get();
			$faker = \Faker\Factory::create();
			$now = time();
			$intTotal = 6;

			DB::table('transfer')->truncate();
			
			$interval = $now - 15552000;
			$intMonth = $interval;
			for($i=0; $i <= 180; $i++)
				{
					foreach($transfer as $user)
						{
							$this->transferAdd($user,$intMonth,$faker);
						}
					$intMonth = $intMonth + 86400;
				}
					
				$checkField =	DB::table('users')->whereNotExists(function ($query) {
													$query->select(DB::raw(1))
													  ->from('transfer')
													  ->whereRaw("transfer.user_id =users.id");
												})->get();


				foreach($checkField as $key=>$user)
					{
						$this->transferAdd($user,$interval,$faker,9,1);
					}
		return back()->withInput();
					
	}	

	public function report()
    {
		$month = isset($_GET['month']) ? (filter_var($_GET['month'], FILTER_SANITIZE_URL)) : '';
		
			$monthArr = $this->monthInterval($month);
		
			$startDate = $monthArr['startDate'];	
			$finalDate = $monthArr['finalDate'];

			$abusers = array();	
				
			$transfer = DB::table('users')
						->join('companies', function($join)
					{
						$join->on('users.id_company', '=','companies.id')->select('users.id', 'users.user_name', 'companies.name');;
					})
			->get();

			$transfer = \DB::table('users')->get();
			$companyQuota = \DB::table('companies')->get();
			
			foreach($companyQuota as $quota)
			{
				$used = 0;
				$abUser = array();
				foreach($transfer as $user){
					$users = DB::table('transfer')->where('user_id', '=', $user->id)
												  ->where('company_id', '=', $quota->id)
												  ->where('date', '>', $startDate)
												  ->where('date', '<', $finalDate)
												  ->sum('transfer');
					if($users > 0)
					{
						$used += $users;
					}				
				}	
				if($quota->quota < $used)
					{
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
		
	
	private function transferAdd($user, $interval, $faker, $randCheck = Null, $rand = NULL)
	{
			
		$randCheck = ($randCheck == NULL ? rand(0,20) : $randCheck);
		if($randCheck > 10)
		{
			$rand = ($rand == NULL ? rand(0,6) : $rand);
						
			for($j = 0; $j < $rand; $j++)
			{
				$data = ['user_id' => $user->id,
				'company_id' =>$user->id_company,
				'resource' => "http://{$faker->ipv4()}",
				'date' => rand($interval,$interval + 86400),
				'transfer' => rand(100,1099511531399)];
			}
			
		}
		if(isset($data)){
			DB::table('transfer')->insert([$data]);
		}
		
	}
			
	private function sortArray($array)
	{
		foreach($array as $k=>$val)
		{
			$sortkey[$array[$k]->limit]=$array[$k];
		}
	
		krsort($sortkey);
	
		return $sortkey;
	}
	
	
	public function reportListCompanies($list)
	{
		foreach ($list as $key => $val) 
			{	
				$abCompany[$val->name]=$val;
			}
		return view('abUsComp', ['list' => $abCompany]);
	}
	public function reportListAbusers()
	{
		$month = isset($_GET['month']) ? (filter_var($_GET['month'], FILTER_SANITIZE_URL)) : '';
		$id = isset($_GET['id']) ? (filter_var($_GET['id'], FILTER_SANITIZE_URL)) : '';
		$monthArr = $this->monthInterval($month);
		
		

		$users = DB::table('transfer')->where('date', '>', $monthArr['startDate'])
									  ->where('company_id', '=', $id)
									  ->where('date', '<', $monthArr['finalDate'])
									  ->join('users', function($join)
									 {
										$join->on('users.id', '=','transfer.user_id')->select('users.id', 'users.user_name', 'transfer.resource');

									})
									->orderBy('transfer','desc')
									->get();
		
		$companyName = DB::table('companies') ->where('companies.id','=',$id)
											  ->select('companies.name')
											  ->first();
           					
	
		foreach($users as $user)
		{
			$user->date = date('j F Y H:m:s',$user->date);
			$user->transfer = $user->transfer/1099511531399;
			$user->transfer = ($user->transfer > 1 ?  round($user->transfer,2).' TB' : round(($user->transfer*1024)).' GB');
		}
	
		return view('listAbusers',['users' => $users,'companyName' => $companyName]);
	}
	
	private function monthInterval($month)
	{
		if(!empty($month))
		{
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
		}
		else
		{
			$monthArr['startDate'] = 0;	
			$monthArr['finalDate'] = 0;
		}
		
		return $monthArr;
	}
			
}