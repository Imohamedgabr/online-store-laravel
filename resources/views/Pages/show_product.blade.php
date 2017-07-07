
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
                    <img class="img-responsive" src="{{ asset('uploads/images/'. $product->imagePath ) }}" alt="">
                    <div class="caption-full">
                        <h4 class="pull-right">${{$product->price}}</h4>

                        <h2>{{$product->title}}</h2>
                        <div>
                        @if( $product->quantity > 0)
                        <p id="available">Available</p>

                        <p>{{$product->description}}</p>
                        <a href="{{ route('product.addToCart',['id'=>$product->id]) }}" class="btn btn-success" role="button"> Add to Cart</a>
                        
                        @else
                        <p  id="outOfStock">Out Of Stock</p>
                        @endif
                        
                        
                        
                        @if(Auth::guard("admin_user")->user())
                        <a href="{{ route('product.edit',['id'=>$product->id]) }}" class="btn btn-info" role="button"> Edit Product</a>
                        

                        {!! Form::open(['route' => ['product.delete', $product->id],'class'=>'delete', 'method' => 'DELETE']) !!}

                        <br>
                        <button class="btn btn-danger delete" onclick="return confirm('Are you sure?')">Delete</button>

                        {!! Form::close() !!}
                         @endif
                         <br>
                        <p><strong>Category: </strong>{{$product->category->name }} </p>


                    </div>
                    <div class="ratings">
                        <p class="pull-right">{{$product->reviews}} reviews</p>
                        <br>
                    @if($average_rating = 0)
                    <p>No reviews here yet, be first to leave one</p>
                    @else
                        <p>

                            <span class="{{$average_rating < 1?"glyphicon glyphicon-star-empty" :"glyphicon glyphicon-star" }}"></span>
                            <span class="{{$average_rating < 2?"glyphicon glyphicon-star-empty" :"glyphicon glyphicon-star" }} "></span>
                            <span class="{{$average_rating < 3?"glyphicon glyphicon-star-empty" :"glyphicon glyphicon-star" }} "></span>
                            <span class="{{$average_rating < 4?"glyphicon glyphicon-star-empty" :"glyphicon glyphicon-star" }} "></span>
                            <span class="{{$average_rating < 5?"glyphicon glyphicon-star-empty" :"glyphicon glyphicon-star" }}"></span>
                            {{$average_rating}} stars
                        </p>
                        @endif
                    </div>
                </div>

                <div class="well">

                    <div class="text-right">
                    {{-- check if this user left a review or not --}}
                    @if( $variable == 0 )
                        <a href="{{ route('review.create',['product_id'=>$product->id]) }}" class="btn btn-success">Leave a Review</a>
                    @endif
                    </div>

                    <hr>
                    {{-- check if this product has any reviews --}}
                    @if(count($ratings_with_users) > 0 )
                    @foreach($ratings_with_users as $rating)
                    <div class="row">
                        <div class="col-md-12">
                        <h4>{{$rating->name }}</h4>
                            <span class="{{$rating->value < 1?"glyphicon glyphicon-star-empty" :"glyphicon glyphicon-star" }}"></span>
                            <span class="{{$rating->value < 2?"glyphicon glyphicon-star-empty" :"glyphicon glyphicon-star" }} "></span>
                            <span class="{{$rating->value < 3?"glyphicon glyphicon-star-empty" :"glyphicon glyphicon-star" }} "></span>
                            <span class="{{$rating->value < 4?"glyphicon glyphicon-star-empty" :"glyphicon glyphicon-star" }} "></span>
                            <span class="{{$rating->value < 5?"glyphicon glyphicon-star-empty" :"glyphicon glyphicon-star" }}"></span>
                            {{$rating->value}} stars
                            <span class="pull-right">{{ date('M j, Y h:ia', strtotime($rating->updated_at)) }}</span>
                            <p>{{$rating->content }} </p>
                            {{-- check if this is the user preview so he can edit it --}}
                            @if($rating->user_id == Auth::id() )
                            <a href="{{ route('review.edit',['id' =>$rating->id ,'product_id'=>$product->id]) }}"><button class="btn btn-info">Edit your review</button></a>
                            
                            {{--  delete form --}}
                            
                            {!! Form::open(['method'=>'DELETE' ,'route'=>['review.delete',$rating->id]]) !!} 
                            <br>
                            <a href="{{ route('review.edit',['id' =>$rating->id ,'product_id'=>$product->id]) }}"><button class="btn btn-danger" onclick="return confirm('Are you sure?')" >Delete your review</button></a>
                            
                           {!! Form::close() !!}
                          
                            
                            @endif
                            <hr>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="row">
                        <div class="col-md-12">
                            <h4>No reviews for this product yet, be the first to leave a review!</h4>
                        </div>
                    </div>
                    @endif

                    <hr>

                </div>

            </div>

        </div>
    
    </div>
    <!-- /.container -->


@endsection