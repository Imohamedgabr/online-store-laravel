<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;
use Storage;
use Session;

class ManageProductsController extends Controller
{

    private $rules = [
            'title'=>['required','min:5'],
            // 'email'=>['required','email'],
            'price'          => 'required|integer',
            'description'          => 'required',
            'category_id'       => 'required|integer',
            'photo'=>['mimes:jpeg,png,gif,bmp']
        ];


    public function index()
    {
    	$products = Product::orderBy('id', 'DESC')->paginate(10);
    	return view('products.index')->with('products',$products);
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create')->with('categories',$categories);
    
    }

    public function store(Request $request)
    {
        
        $this->validate($request, $this->rules);

        $product = new Product;
        $product->title= $request->title;
        $product->price= $request->price;
        $product->quantity= $request->quantity;
        $product->category_id= $request->category_id;
        $product->description= $request->description;

        if ($request->hasFile('photo')) {

            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $destination = public_path(). '\\uploads\\images\\';
            // dd($destination);
            $request->file('photo')->move($destination,$filename);
            $product->imagePath = $filename;
        }
        
        $product->save();
        // dd($product);
        return redirect()->route('product.show', ['id' => $product->id])->with('success','product created');

    }

    public function edit($id)
    {
    	$product = Product::find($id);
        $categories = Category::all();

        // dd($categories);
   		return view('products.edit')->with('product',$product)->with('categories',$categories);
    }

    public function update(Request $request,$id)
    {
    	$product = product::find($id);

        $this->validate($request, $this->rules);

        $product->title= $request->title;
        $product->price= $request->price;
        $product->quantity= $request->quantity;
        $product->category_id= $request->category_id;
        $product->description= $request->description;

        if ($request->hasFile('photo')) {

            // delete old photo
             $image_path = public_path(). '\\uploads\\images\\' .$product->imagePath;
            // delete
            unlink($image_path);
            
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $destination = public_path(). '\\uploads\\images\\';
            // dd($destination);
            $request->file('photo')->move($destination,$filename);
            $product->imagePath = $filename;
        }
        
        $product->save();
        // dd($product);
        return redirect()->route('product.show', ['id' => $product->id])->with('success','product updated');
    }

    public function destroy($id)
    {
        //find our product
        $product = product::find($id);
        $image_path = public_path(). '\\uploads\\images\\' .$product->imagePath;
        // delete
        unlink($image_path);

        $product->delete();
        Session::flash('success','The product was deleted! ');
        return redirect()->route('products.index');
    }
}
