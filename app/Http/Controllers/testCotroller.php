<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testCotroller extends Controller
{
    public function index(Request $request){
		return view('index');
	}

	public function addtest(Request $request){
		$data = $request->all();
		dd($data);
		foreach($data as $datas){
			dd($datas);
		}
		
	}
}
