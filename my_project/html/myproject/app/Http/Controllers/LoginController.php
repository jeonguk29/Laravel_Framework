<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    // DB 클래스 사용
use App\Models\Officer;

class LoginController extends Controller
{
    public function check()
	{
		$uid42 = request("uid42");
		$pwd42 = request("pwd42");
		
		$row = Officer::where('uid42','=',$uid42)->
		where('pwd42','=',$pwd42)->first();
		if($row)
		{
			session()->put('uid42',$row->uid42);
			session()->put('position42',$row->position42);
		}
		
		return view('main');
	}
    
	public function logout()
	{

		session()->forget('uid42');
		session()->forget('position42');
		
		return view('main');
	}

}


