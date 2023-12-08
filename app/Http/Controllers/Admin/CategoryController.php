<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Exception;
use App\Http\Requests\StoreCategoryFormRequest;

class CategoryController extends Controller
{
    public function index()
	{
	    $categories = Category::orderBy('id','desc')->paginate(5);
	   
	    return view('admin.pages.categories.index', compact('categories'));
	}

	public function create()
	{	    
	    return view('admin.pages.categories.create');
	}

	public function store(StoreCategoryFormRequest $request)
    {
    	try{

    	$input = $request->all();

    	$categories = new Category;
       
    	$categories->name = $input['name'];
		$categories->description = $input['description'];

		if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('images/category'), $filename);           
            $categories->image = $filename;
        }
			
		$categories->save();      
        
         return redirect()->route('admin.categories.index')
->with('success','Category has been created successfully.');

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
		    $category = Category::where('id',$id)->first();  
				   
		    return view('admin.pages.categories.edit', compact('category'));

	     }catch(Exception $e){
	     	return response()->json([
         		"success" => false,
         		"errors" => $e->getMessage()
         	]);
	     }
	}

	public function update(StoreCategoryFormRequest $request)
	{
	    
        $input = $request->all();

    	$categories = Category::find($input['id']);
       
    	$categories->name = $input['name'];
		$categories->description = $input['description'];

		if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('images/category'), $filename);           
            $categories->image = $filename;
        }
			
		$categories->save(); 

     return redirect()->route('admin.categories.index')
		->with('success','Category has been updated successfully');
	   
	}

	public function destroy(Request $request,$id)
	{
		
		 // delete
        $category = Category::find($id);
        $category->delete();

		return redirect()->route('admin.categories.index')
		->with('success','Category has been deleted successfully');
	}
}
