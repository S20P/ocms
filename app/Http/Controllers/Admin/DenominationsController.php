<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Denominations;
use Exception;


class DenominationsController extends Controller
{
    public function index()
	{
	    $denominations = Denominations::orderBy('id','desc')->paginate(10);
	   
	    return view('admin.pages.denomination.index', compact('denominations'));
	}

	public function destroy(Request $request,$id)
	{		
		 // delete
        $denomination = Denominations::find($id);
        $denomination->delete();

		return redirect()->route('admin.denomination.index')
		->with('success','Denomination has been deleted successfully');
	}
}
