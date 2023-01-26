<?php

namespace App\Http\Controllers\Api\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

	//create category
    public function createCategory(Request $request){

		$validated = Validator::make($request->all(),[
			'category_name'     => 'required|string|max:255|unique:categories',
		]);
		
		if($validated->fails()){
			return response()->json(array(
				'data' => array(),
				'status' => false,
				'message' => array('Enter valid and unique value ')
			), 400);
		}else{
			$data = [
				'category_name' => $request-> category_name,
				'is_active'     => 1
			];
			$category_data = Category::create($data);
			$massage = responseCase($category_data->toArray());
			return response()->json(array(
				'data' => $massage,
				'status' => true,
				'message' => array('Category added successfully.')
			), 200);
		}
	}

	//delete category
	public function deleteCategoey(Request $request){

		$validated = Validator::make($request->all(),[
			'category_id' => 'required|integer',
		]);
		if($validated->fails()){
			return response()->json(array(
				'data' => array(),
				'status' => false,
				'message' => array('Category not found. ')
			), 400);
		}else{
			$category_data = Category::where('id',$request->category_id)->delete();
			return response()->json(array(
				'data' => " ",
				'status' => true,
				'message' => array('Data deleted successfully.')
			), 200);
		}
	}

	public function getCategoryData(Request $request){
		$validated = Validator::make($request->all(),[
			'category_id' => 'required|integer',
		]);
		if($validated->fails()){
			return response()->json(array(
				'data' => array(),
				'status' => false,
				'message' => array('Category not found. ')
			), 400);
		}else{
			$category_data = Category::where('id',$request->category_id)->first();
			$massage = responseCase($category_data->toArray());
			return response()->json(array(
				'data' => $massage,
				'status' => true,
				'message' => array('Data found.')
			), 200);

		}
	}

	public function editCategoryData(Request $request){
		$validated = Validator::make($request->all(),[
			'category_id' => 'required|integer',
			'category_name' => 'required|string|max:255'
		]);
		
		if($validated->fails()){
			return response()->json(array(
				'data'=> '',
				'status'=> false,
				'massage'=> array('Enter valid value')
			),400);
		}else{
			$category_data = Category::where('id', $request->category_id)->first();
			if(!empty($category_data)){
				$category_data->category_name = $request->category_name ;

				$category_data->update();

				$massage = responseCase($category_data->toArray());
				return response()->json(array(
					'data' => $massage,
					'status' => true,
					'message' => array('Data update successfully.')
				), 200);
			}else{
				return response()->json(array(
					'data'=> '',
					'status'=> false,
					'massage'=> array('Category not found')
				),404);
			}
		}
	}
}
