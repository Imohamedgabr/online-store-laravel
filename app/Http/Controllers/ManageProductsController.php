<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;

class ManageProductsController extends Controller
{
    public function index()
    {
    	$products = Product::paginate(10);
    	return view('products.index')->with('products',$products);
    }

    public function edit($id)
    {
    	$product = Product::find($id);
   		return view('products.edit')->with('product',$product);
    
    }

    public function update(Request $request,$id)
    {
    	
    }
}
