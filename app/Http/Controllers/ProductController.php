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
use App\Category;
use App\Offer;
use App\Rating;
use App\User;
use App\AdminUser;

class ProductController extends Controller
{

    public function getIndex(Request $request)
    {	
        if ($category_id = $request->get("category_id")) {
            $products = Product::where('category_id' , $category_id)->paginate(14);
        }elseif($term = $request->get('term')) {
            $products =DB::table('products')
            ->where('title','like','%' . $term . '%')
            ->orderBy("id","desc")
            ->paginate(14);
         // no filters added
        }else{
            $products = Product::paginate(14);
        }
    	$offers = Offer::all();
        $categories = Category::all();

    	return view('pages.welcome',['products'=>$products , 'categories'=>$categories, 'category_id'=>$category_id, 'offers'=>$offers ]);
    }	

    public function autocomplete(Request $request)
    {
        if($term = $request->get('term')) {
            $products =DB::table('products')
            ->where('title','like','%' . $term . '%')
            ->orderBy("id","desc")
            ->take(5)
            ->get();
        }
        $results = [];

        foreach ($products as $product) {
            $results[] = ['id' => $product->id , 'value' => $product->title];
        }
        return response()->json($results);

    }


    public function showProduct(Request $request,$id)
    {	
        
        $this->id = $id;
        $variable = 0;
        $ratings_with_users = collect();
        $ratings_array = [];
        
        // get the average rating
        $rating_exist = Rating::all();
        if ($rating_exist->contains('product_id',$id)) {

        $ratings_with_users = DB::table('users')
        ->join('ratings', function ($join) {
            $join->on('ratings.user_id', '=', 'users.id')
                 ->where('ratings.product_id', '=', $this->id );
        })
        ->get();
        // if we join ratings with users the rating id gets wrong values so watch out
        // dd($ratings_with_users);

        foreach ($ratings_with_users as $rating) {
            array_push($ratings_array, $rating->value);
        }

        $average_rating = array_sum($ratings_array) / count($ratings_array); 
        $average_rating = ceil($average_rating);
    }else{
        $average_rating = 0;
    }
        // dd( $ratings_with_users );

        if ($category_id = $request->get("category_id")) {
            $products = Product::where('category_id' , $category_id)->paginate(14);
        }else{
            $product = Product::find($id);
        }
        
        $categories = Category::all();        
        
        DB::table('products')
            ->where('id', $id)
            ->increment('reviews');
        if ($ratings_with_users->contains('user_id',Auth::id())) 
        {
            $variable = 1;
        }
        // dd($variable);

        return view('pages.show_product',['variable'=>$variable ,'average_rating'=>$average_rating,'ratings_with_users'=> $ratings_with_users ,'product'=>$product, 'categories'=>$categories, 'category_id'=>$category_id]);
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

    public function getReduceByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart); // it expects it
        $cart->reduceByOne($id);

        if (count($cart->items) > 0  ) {
            Session::put('cart', $cart);
        }else{
            Session::forget('cart');
        }

        return redirect()->route('product.shoppingCart');
    }


    public function getRemoveItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart); // it expects it
        $cart->removeItem($id);

        if (count($cart->items) > 0  ) {
            Session::put('cart', $cart);
        }else{
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');

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
            
            $order->cart = unserialize($order->cart);
//---------------------------------------------------------------

            // we pass data to the constructor of the notification class
            AdminUser::find(1)->notify(new \App\Notifications\NewOrderMade(Auth::user()) );
    

        } catch(\Exception $e){
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }
              
        Session::forget('cart');
        return redirect()->route('product.index')->with('success' , 'successfully purchased products');
    }
}
