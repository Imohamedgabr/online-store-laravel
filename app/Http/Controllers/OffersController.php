<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Offer;
use App\Category;
use Storage;
use Session;

class OffersController extends Controller
{

	private $rules = [
            'title'=>['required','min:5'],
            // 'email'=>['required','email'],
            'price'          => 'required|integer',
            'description'          => 'required',
            'category_id'       => 'required|integer',
            'discount_percent'       => 'required|integer',
            'photo'=>['mimes:jpeg,png,gif,bmp']
        ];


    public function showOffer(Request $request ,$id)
    {
        if ($category_id = $request->get("category_id")) {
            $offers = Offer::where('category_id' , $category_id)->paginate(14);
        }else{
            $offer = Offer::find($id);
            // calculate the new price
            
            $dicount_amount = ($offer->price * $offer->discount_percent) / 100;
            $newPrice = $offer->price - $dicount_amount;

            if ($newPrice < 0 ) {
                $newPrice = 0;
            }
        }
        
        $categories = Category::all();

        // $newPrice = 20;
        
        DB::table('offers')
            ->where('id', $id)
            ->increment('reviews');

        return view('offers.showOffer')->with('offer',$offer)->with('categories',$categories)->with('category_id',$category_id)->with('newPrice',$newPrice);

    }

    public function index()
    {
    	$offers = Offer::orderBy('id', 'DESC')->paginate(10);
    	return view('offers.index')->with('offers',$offers);
    }

    public function create()
    {
        $categories = Category::all();
        return view('offers.create')->with('categories',$categories);
    
    }

    public function store(Request $request)
    {
        
        $this->validate($request, $this->rules);

        $offer = new Offer;
        $offer->title= $request->title;
        $offer->price= $request->price;
        $offer->quantity= $request->quantity;
        $offer->category_id= $request->category_id;
        $offer->discount_percent= $request->discount_percent;
        $offer->description= $request->description;

        if ($request->hasFile('photo')) {

            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $destination = public_path(). '\\uploads\\images\\';
            // dd($destination);
            $request->file('photo')->move($destination,$filename);
            $offer->imagePath = $filename;
        }
        
        $offer->save();
        // dd($offer);
        return redirect()->route('offers.index');
        // return redirect()->route('offer.show', ['id' => $offer->id])->with('success','offer created');

    }

    public function edit($id)
    {
        $offer = Offer::find($id);
        $categories = Category::all();

        // dd($categories);
        return view('offers.edit')->with('offer',$offer)->with('categories',$categories);
    }

    public function update(Request $request,$id)
    {
        $offer = Offer::find($id);

        $this->validate($request, $this->rules);

        $offer->title= $request->title;
        $offer->price= $request->price;
        $offer->quantity= $request->quantity;
        $offer->category_id= $request->category_id;
        $offer->description= $request->description;

        if ($request->hasFile('photo')) {

            // delete old photo
             $image_path = public_path(). '\\uploads\\images\\' .$offer->imagePath;
            // delete
            unlink($image_path);
            
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $destination = public_path(). '\\uploads\\images\\';
            // dd($destination);
            $request->file('photo')->move($destination,$filename);
            $offer->imagePath = $filename;
        }
        
        $offer->save();
        // dd($offer);
        return redirect()->route('offers.index');
        // return redirect()->route('offer.show', ['id' => $offer->id])->with('success','offer updated');
    }

    public function destroy($id)
    {
        //find our offer
        $offer = Offer::find($id);
        $image_path = public_path(). '\\uploads\\images\\' .$offer->imagePath;
        // delete
        unlink($image_path);

        $offer->delete();
        Session::flash('success','The offer was deleted! ');
        return redirect()->route('offers.index');
    }
}
