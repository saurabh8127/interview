<?php

namespace App\Http\Controllers\Api\Color;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ColorCaontroller extends Controller
{
    //create category
    public function createColor(Request $request){
		
		$validated = Validator::make($request->all(),[
			'name'     => 'required|string|max:255|unique:colors',
		]);
		
		if($validated->fails()){
			return response()->json(array(
				'data' => array(),
				'status' => false,
				'message' => array('Enter valid and unique value ')
			), 400);
		}else{
			$data = [
				'name' => $request->name,
				'is_active'     => 1
			];
			$color_data = Color::create($data);
			$massage = responseCase($color_data->toArray());
			return response()->json(array(
				'data' => $massage,
				'status' => true,
				'message' => array('Color added successfully.')
			), 200);
		}
	}

	//delete category
	public function deleteColor(Request $request){

		$validated = Validator::make($request->all(),[
			'color_id' => 'required|integer',
		]);
		if($validated->fails()){
			return response()->json(array(
				'data' => array(),
				'status' => false,
				'message' => array('Color not found. ')
			), 400);
		}else{
			$category_data = Color::where('id',$request->color_id)->delete();
			return response()->json(array(
				'data' => " ",
				'status' => true,
				'message' => array('Data deleted successfully.')
			), 200);
		}
	}

	public function getColorData(Request $request){
		$validated = Validator::make($request->all(),[
			'color_id' => 'required|integer',
		]);
		if($validated->fails()){
			return response()->json(array(
				'data' => array(),
				'status' => false,
				'message' => array('Color not found. ')
			), 400);
		}else{
			$color_data = Color::where('id',$request->color_id)->first();
			$massage = responseCase($color_data->toArray());
			return response()->json(array(
				'data' => $massage,
				'status' => true,
				'message' => array('Data found.')
			), 200);

		}
	}

	public function editColorData(Request $request){
		$validated = Validator::make($request->all(),[
			'color_id' 	=> 'required|integer',
			'name' 		=> 'required|string|max:255'
		]);
		
		if($validated->fails()){
			return response()->json(array(
				'data'=> '',
				'status'=> false,
				'massage'=> array('Enter valid value')
			),400);
		}else{
			$color_data = Color::where('id', $request->color_id)->first();
			if(!empty($color_data)){
				$color_data->name = $request->name ;

				$color_data->update();

				$massage = responseCase($color_data->toArray());
				return response()->json(array(
					'data' => $massage,
					'status' => true,
					'message' => array('Data update successfully.')
				), 200);
			}else{
				return response()->json(array(
					'data'=> '',
					'status'=> false,
					'massage'=> array('Color not found')
				),404);
			}
		}

	}
}
