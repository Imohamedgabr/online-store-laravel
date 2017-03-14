<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Session;
use App\Cart;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Support\Facades\Auth;
use App\Order;

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

    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        // dd($request->session()->get('cart')); //if you want to check
        return redirect()->route('product.index');
    }

    public function getCart()
    {
        if(!Session::has('cart')){
            return view('pages.shopping-cart', ['products'=> null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('pages.shopping-cart',['products'=> $cart->items , 'totalPrice' => $cart->totalPrice ]);
    }

    public function getCheckout()
    {
        if(!Session::has('cart')){
            return vew('pages.shopping-cart', ['products'=> null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('pages.checkout',['total'=>$total]);

    }

    public function postCheckout(Request $request)
    {
         if (!Session::has('cart')) {
            return redirect()->route('product.shoppingCart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        Stripe::setApiKey("sk_test_SylISVf8ZtzuBujkEDAIcHz6");
        try{
            
            $charge = Charge::create(array(
              "amount" => $cart->totalPrice * 100 ,
              "currency" => "usd",
              "source" => $request->input('stripeToken'),
              "description" => "Test Charge"
            ));

            $order = new Order();
            // takes my php object and convert it into a string
            $order->cart = serialize($cart); 
            $order->address = $request->input('address');
            $order->name = $request->input('name');
            $order->payment_id = $charge->id;
            // now we make the relation
            // how to make a query and save something database 
            // thats how to save related objects in the database
            Auth::user()->orders()->save($order);


        } catch(\Exception $e){
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }
              
        Session::forget('cart');
        return redirect()->route('product.index')->with('success' , 'successfully purchased products');
    }
}
