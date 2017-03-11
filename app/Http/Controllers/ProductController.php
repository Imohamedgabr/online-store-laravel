<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getIndex()
    {	
    	$products = Product::all();
    	return view('pages.welcome',['products'=>$products]);
    }	

    public function showProduct($id)
    {	
        $product = Product::find($id);
        
        DB::table('products')
            ->where('id', $id)
            ->increment('reviews');

        return view('pages.show_product',['product'=>$product]);
    }	
}
