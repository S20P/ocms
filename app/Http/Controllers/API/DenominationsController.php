<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Denominations;
use App\Models\Coupon;
use Validator;
class DenominationsController extends Controller
{


	public function index()
    {
       
        return [
            "status" => 1,
            "data" => []
        ];
    }

	public function store(Request $request)
    {
		
		
    	$input = $request->all();

		$validator = Validator::make($input, [
			'name' => 'required|max:255',
            'email' => 'required|max:255', 
            'amount' => 'required',
            'category_name' => 'required',			
        ]);

		if($validator->fails()){

			$response = [
				'success' => false,
				'message' => $validator->errors(),
			]; 			
			return response()->json($response, 404);
        }

		$coupon_find = Coupon::select("id","coupon_code")->where("status",0)
		                        ->where("amount",$input['amount'])
								->where("category_name",$input['category_name'])
								->orderBy("id","desc")->first();
        if($coupon_find){
			$coupon_code = $coupon_find->coupon_code;
			$denomination = new Denominations;
			$denomination->name = $input['name'];
			$denomination->email = $input['email'];
			$denomination->mobile_number = $input['mobile_number']??null;
			$denomination->coupon_code = $coupon_code;
			$denomination->amount = $input['amount'];			
			$denomination->save(); 
		
			Coupon::where("id",$coupon_find->id)->update(["status"=>1]);

			$denomination->coupon_code = $this->formatCreditCardNumber($coupon_code);
			$data = $denomination;
			$data["category_name"] = $input['category_name'];
			 	

			return response()->json([
				"status" => true,
				"message" => "Coupon find successfully",
				"data" => $data
			],200);
        
		}else{
			return response()->json([
				"status" => false,
				"message" => "Coupon not found!"
			],404);
		}

    }  


	public function formatCreditCardNumber($input) {
		// Remove any non-numeric characters
		$input = preg_replace('/\D/', '', $input);
	
		// Chunk the string into groups of 4 characters
		$chunks = str_split($input, 4);
	
		// Join the chunks with a hyphen
		$formattedNumber = implode('-', $chunks);
	
		return $formattedNumber;
	}

}
