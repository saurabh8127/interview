<?php

namespace App\Http\Controllers\test;

use App\Models\Test1;
use App\Models\UserVarient;
use App\Models\UserCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class testController extends Controller
{
    public function index(Request $request){
		return view('test1/index');
	}

	public function addTest(Request $request){
		$input = $request->all();
		$data = [
			$name =  $request->name,
			$price =  $request->price,
		];
        $testId = Test1::insertGetId(['name' => $request->name,'price' => $request->price]);

		$varient = $request->varient;
		foreach($varient as $value){
			$vdata = [
				'varient' => $value,
				'user_id' => $testId
			];
			UserVarient::create($vdata);
		}


		$category = $request->category;
		foreach($category as $value){
			$vdata = [
				'category' => $value,
				'user_id' => $testId
			];
			UserCategory::create($vdata);
		}

		dd("adddddd");
	}
}
