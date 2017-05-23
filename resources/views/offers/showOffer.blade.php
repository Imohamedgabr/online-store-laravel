
@extends('main')
<!-- main is the name of the page under views -->

@section('title',' | HomePage ')

@section('stylesheets')
	<link rel="stylesheet" href="{{ URL::asset('css/product.css') }}" />
@endsection

@section('content')
	
    
    <!-- Page Content -->
    <div class="container">

		@include('partials._sideBar')

	 <div class="col-md-9">

                <div class="thumbnail">
                    <img class="img-responsive" src="{{ asset('uploads/images/'. $offer->imagePath ) }}" alt="">
                    <div class="caption-full">
                        <h4 class="pull-right">${{$offer->price}}</h4>

                        <h2>{{$offer->title}}</h2>
                        <div>
                        @if( $offer->quantity > 0)
                        <p id="available">Available</p>
                        @else
                        <p  id="outOfStock">Out Of Stock</p>
                        @endif
                        
                        <p>{{$offer->description}}</p>
                        <a href="{{ route('product.addToCart',['id'=>$offer->id]) }}" class="btn btn-success" role="button"> Add to Cart</a>
                        
                        @if(Auth::guard("admin_user")->user())
                        <a href="{{ route('offer.edit',['id'=>$offer->id]) }}" class="btn btn-info" role="button"> Edit Offer</a>
                        

                        {!! Form::open(['route' => ['offer.delete', $offer->id],'class'=>'delete', 'method' => 'DELETE']) !!}

                        <br>
                        <button class="btn btn-danger delete" onclick="return confirm('Are you sure?')">Delete</button>

                        <h3>{{$offer->discount_percent }} % Off this product</h3>
                        <h3> The New Price is {{$newPrice }} $</h3>

                        {!! Form::close() !!}
                         @endif
                         <br>
                       {{--  <p><strong>Category: </strong>{{$offer->category->name }} </p> --}}


                    </div>
                    <div class="ratings">
                        <p class="pull-right">{{$offer->reviews}} reviews</p>
                        <br>
                        <p>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            4.0 stars
                        </p>
                    </div>
                </div>

                <div class="well">

                    <div class="text-right">
                        <a class="btn btn-success">Leave a Review</a>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">10 days ago</span>
                            <p>This offer was great in terms of quality. I would definitely buy another!</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">12 days ago</span>
                            <p>I've alredy ordered another one!</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">15 days ago</span>
                            <p>I've seen some better than this, but not at this price. I definitely recommend this item.</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    
    </div>
    <!-- /.container -->


@endsection