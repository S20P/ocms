<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Exception;
use App\Http\Requests\StoreCouponFormRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CouponImport;
use App\Models\Category;
class CouponsController extends Controller
{
    public function index()
	{

		$categories = Category::select('id','name','shortcode')->get();
	    $coupons = Coupon::orderBy('id','desc')->paginate(10);
	   
	    return view('admin.pages.coupon.index', compact('coupons','categories'));
	}

	public function create()
	{	  
		$categories = Category::select('id','name','shortcode')->get(); 
	    return view('admin.pages.coupon.create',["categories" => $categories]);
	}

	public function store(StoreCouponFormRequest $request)
    {

     try{

    	$input = $request->all();

    	$coupon = new Coupon;
       
    	$coupon->coupon_code = $input['coupon_code'];
		$coupon->amount = $input['amount'];
		$coupon->category_name = $input['category_name'];		
		$coupon->status = $input['status'];
		$coupon->save();  

		return redirect()->route('admin.coupon.index')->with('success','Coupon has been created successfully.');

        }catch(Exception $e){
         	return response()->json([
         		"success" => false,
         		"errors" => $e->getMessage()
         	]);
       }
        

    }

    public function edit(Request $request,$id)
	{
		try{
		    $coupon = Coupon::where('id',$id)->first();  
			$categories = Category::select('id','name','shortcode')->get();

		    return view('admin.pages.coupon.edit', compact('coupon','categories'));

	     }catch(Exception $e){
	     	return response()->json([
         		"success" => false,
         		"errors" => $e->getMessage()
         	]);
	     }
	}

	public function update(StoreCouponFormRequest $request)
	{
	    
	    $input = $request->all();

	    $coupon = Coupon::find($input['id']);
		$coupon->coupon_code = $input['coupon_code'];
		$coupon->amount = $input['amount'];
		$coupon->category_name = $input['category_name'];	
		$coupon->status = $input['status'];
		$coupon->save();  
	

     return redirect()->route('admin.coupon.index')
		->with('success','Coupon has been updated successfully');
	   
	}

	public function destroy(Request $request,$id)
	{
		
		 // delete
        $coupon = Coupon::find($id);
        $coupon->delete();

		return redirect()->route('admin.coupon.index')
		->with('success','Coupon has been deleted successfully');
	}


	public function import(Request $request)
	{
		set_time_limit(0);
		 // delete

		 $request->validate([
            'file' => 'required|mimes:xlsx,xls',
			'category_name' => 'required'
         ]);

		 $data = [
			'category_name' => $request->category_name, 
			// other data here
		]; 
		 $file = $request->file('file');
		 Excel::import(new CouponImport($data), $file);

		return redirect()->route('admin.coupon.index')
		->with('success','Coupons has been imported successfully');
	}
}
