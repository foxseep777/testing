<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Hello extends Controller
{
        public function index()
        {
             $users = \DB::select('select * from test');
			// return $users;

        return view('hello', ['users' => $users]);
        }
}
