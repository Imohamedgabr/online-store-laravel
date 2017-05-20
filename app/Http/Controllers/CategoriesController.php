<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;

class CategoriesController extends Controller
{
    public function index()

    {
    	$categories = Category::all();
    	return view('categories.index')->with('categories', $categories);
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'name'=>'required',

    	]);

    	// return $request->name;
    	$category = Category::create($request->all());
    	return response()->json(['category'=>$category]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->name);
        // dd($id);
        $category = Category::find($id);

        $this->validate($request, ['name' => 'required|max:255']);

        $category->name = $request->name;
        
        $category->save();

        Session::flash('success', 'Category updated Successfully!');

        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        
        $category->delete();

        Session::flash('success', 'Category deleted Successfully!');

        return redirect()->route('categories.index');
    }


}
