<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rating;
use Auth;
use Session;

class ReviewsController extends Controller
{
	private $rules = [
            'content'=>['required','min:5'],
            // 'email'=>['required','email'],
            'rating'          => 'required|integer'
        ];

    public function create(Request $request)
    {
    	// get the product_id from the url
    	$product_id = $request->get('product_id');
    	// dd($product_id);
    	return view('ratings.create')->with('product_id' , $product_id);

    }

    public function store(Request $request)
    {
    	// dd($request);
    	
    	$this->validate($request, $this->rules);
    	$rating = new Rating;
        $rating->content= $request->content;
		$rating->value= $request->rating;
		$rating->product_id= $request->product_id;
		$rating->user_id = Auth::id();
		$rating->save();

		return redirect()->route('product.show', ['id' => $request->product_id]);
    }

    public function edit(Request $request)
    {

    	$rating = Rating::find($request->id);
    	// dd($rating);

    	$product_id = $request->get('product_id');
    
   		return view('ratings.edit')->with('rating',$rating)->with('product_id' , $product_id);
    }

    public function update(Request $request,$id)
    {
    	// dd($request);
    	$this->validate($request, $this->rules);

		$rating = Rating::find($id);

        $rating->content= $request->content;
		$rating->value= $request->rating;
		$rating->product_id= $request->product_id;
		$rating->user_id = Auth::id();
		$rating->save();

		return redirect()->route('product.show', ['id' => $request->product_id]);
    }

    public function destroy(Request $request,$id)
    {
    	
    	$rating = Rating::find($id);

    	$rating->delete();

        return redirect()->route('product.index');
    
    }
}
