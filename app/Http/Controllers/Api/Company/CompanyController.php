<?php

namespace App\Http\Controllers\Api\Company;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{

    public function createCompany(Request $request){
		$validated = Validator::make($request->all(),[
			'company_name' 	=> 'required|string|unique:companies',
			'phone' 		=> 'required|numeric|digits:10|unique:companies',
			'email' 		=> 'required|string|unique:companies',
			'address'		=> 'required|string',
			'company_contact_person_name' => 'required|string',
		]);
		if($validated->fails()){
			return response()->json(array(
				'data' => array(),
				'status' => false,
				'message' => array('Enter valid data.')
			), 400);
		}else{
			$data = [
				'company_name' 	=> $request->company_name,
				'phone'			=> $request->phone,
				'email'			=> $request->email,
				'address'		=> $request->address,
				'company_contact_person_name'=>$request->company_contact_person_name,
			];

			$company_data = Company::create($data);
			$message = responseCase($company_data->toArray());
			return response()->json(array(
				'data' => $message,
				'status' => true,
				'message' => array('Company added successfully.')
			), 200);
		}
	}

	public function deleteCompany(Request $request){
	
		$validated = Validator::make($request->all(),[
			'company_id' => 'required'
		]);
		if($validated->fails()){
			return response()->json(array(
				'data' 		=> [],
				'status' 	=> false,
				'message' 	=> ['Enter valid data.']
			),400);
		}else{
			$company_data = Company::where('id',$request->company_id)->delete();
			return response()->json(array(
				'data' => " ",
				'status' => true,
				'message' => ['Company details deleted successfully.']
			), 200);
		}
	}


	public function getCompanyData(Request $request){
		$validated = Validator::make($request->all(),[
			'company_id' => 'required|integer',
		]);
		if($validated->fails()){
			return response()->json(array(
				'data' => array(),
				'status' => false,
				'message' => ['Enter valid data.']
			), 400);
		}else{
			$company_data = Company::where('id',$request->company_id)->first();
			$message = responseCase($company_data->toArray());
			return response()->json(array(
				'data' => $message,
				'status' => true,
				'message' => array('Data found.')
			), 200);

		}
	}

	public function editCompanyData(Request $request){
		if(!empty($request->company_id)){
			
			$validated = Validator::make($request->all(),[
				'company_name' 	=> 'required|string',
				'phone' 		=> 'required|numeric|digits:10',
				'email' 		=> 'required|string',
				'address'		=> 'required|string',
				'company_contact_person_name' => 'required|string',
			]);
			
			if($validated->fails()){
				return response()->json(array(
					'data'=> '',
					'status'=> false,
					'message'=> array('Enter valid value')
				),400);
			}else{
				$company_data = Company::where('id', $request->company_id)->first();
				if($company_data->company_name != $request->company_name && $company_data->phone != $request->phone && $company_data->email != $request->email){
				
					$company_data->company_name 	= $request->company_name;
					$company_data->phone			= $request->phone;
					$company_data->email			= $request->email;
					$company_data->address			= $request->address;
					$company_data->company_contact_person_name=$request->company_contact_person_name;
	
					$company_data = $company_data->update();
	
					return response()->json(array(
						'data' => [],
						'status' => true,
						'message' => array('Data update successfully.')
					), 200);
				}else{
					return response()->json(array(
						'data'=> '',
						'status'=> false,
						'massage'=> array('Found duplicate data ')
					),404);
				}
			}
		}
		
		
		
	}
}
