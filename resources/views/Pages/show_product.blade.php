
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
                    <img class="img-responsive" src="{{$product->imagePath}}" alt="">
                    <div class="caption-full">
                        <h4 class="pull-right">${{$product->price}}</h4>

                        <h2>{{$product->title}}</h2>
                        <div>
                        @if( $product->quantity > 0)
                        <p id="available">Available</p>
                        @else
                        <p  id="outOfStock">Out Of Stock</p>
                        @endif
                        
                        <p>{{$product->description}}</p>
                    </div>
                    <div class="ratings">
                        <p class="pull-right">{{$product->reviews}} reviews</p>
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
                            <p>This product was great in terms of quality. I would definitely buy another!</p>
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