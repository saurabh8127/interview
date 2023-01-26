<?php

namespace App\Http\Controllers\Api\Item;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    public function addItem(Request $request){
		$validated = Validator::make($request->all(),[
			'company_id' 	=> 'required|integer',
			'description' 	=> 'required|string',
			'category_id' 	=> 'required|integer',
			'color_id'		=> 'required|integer',
			'name'			=> 'required|string|max:225',
			'quentity'		=> 'required|numeric',
		]);	

		if($validated->fails()){
			return response()->json(array(
				'data' => array(),
				'status' => false,
				'message' => array('Enter valid data.')
			), 400);
		}else{
			$data = [
				'company_id' 	=> $request->company_id,
				'category_id'	=> $request->category_id,
				'color_id'		=> $request->color_id,
				'date'			=> date("Y/m/d"),
				'description'  	=> $request->description,
				'name'			=> $request->name,
				'quentity'  	=> $request->quentity,
			];

			$item_details = Item::create($data);
			$message = responseCase($item_details->toArray());
			return response()->json(array(
				'data' => $message,
				'status' => true,
				'message' => array('Item added successfully.')
			), 200);
		}
	}

	public function deleteItem(Request $request){
		$validated = Validator::make($request->all(),[
			'item_id' 	=> 'required|integer'
		]);
		if($validated->fails()){
			return response()->json(array(
				'data' =>'',
				'status' =>false,
				'message' => ["Enter valid data"]
			),400);
		}else{
			$item_details = Item::where('id',$request->item_id)->delete();
			return response()->json(array(
				'data' => '',
				'status' => true,
				'message' => ['Item details deleted successfully.']
			), 200);
		}
	}

	public function getItemData(Request $request){
		$validated = Validator::make($request->all(),[
			'item_id' 	=> 'required|integer'
		]);
		if($validated->fails()){
			return response()->json(array(
				'data' =>'',
				'status' => false,
				'message' => ["Enter valid data"]
			),400);
		}else{
			$get_item = Item::where('id',$request->item_id)->get();
			$message = responseCase($get_item->toArray());
			return response()->json(array(
				'data' => $message,
				'status' => true,
				'message' => ['Item details deleted successfully.']
			), 200);
		}
	}

	public function editItemData(Request $request){
		if(!empty($request->item_id)){
			
			$validated = Validator::make($request->all(),[
				'company_id' 	=> 'required|integer',
				'description' 	=> 'required|string',
				'category_id' 	=> 'required|integer',
				'color_id'		=> 'required|integer',
				'name'			=> 'required|string|max:225',
				'quentity'		=> 'required|numeric',
			]);
			
			if($validated->fails()){
				return response()->json(array(
					'data'=> '',
					'status'=> false,
					'message'=> array('Enter valid value')
				),400);
			}else{
				$item_data = Item::where('id', $request->item_id)->first();
				// dd($item_data);
				$item_data->company_id 	= $request->company_id;
				$item_data->category_id	= $request->category_id;
				$item_data->date		= date("Y/m/d");
				$item_data->description	= $request->description;
				$item_data->name 		= $request->name;
				$item_data->quentity	= $request->quentity;
				$item_data = $item_data->update();

				return response()->json(array(
					'data' => [],
					'status' => true,
					'message' => array('Data update successfully.')
				), 200);
			}
		}	
		
	}
}
