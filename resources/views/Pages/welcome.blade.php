
@extends('main')
<!-- main is the name of the page under views -->

@section('title',' | HomePage ')

@section('content')


    <!-- Page Content -->
    <div class="container">
        @if(Session::has('success'))
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                <div id="charge-message" class="alert alert-success">
                    {{Session::get('success') }}
                </div>
            </div>
        </div>
        @endif
     
            <div class="col-md-12">
                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide size-control" data-ride="carousel" >
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                                
                            </ol>
                            <div class="carousel-inner">
                                
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item active">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
                <div class="col-md-12">
                @include('partials._sideBar') 
                <div class="col-md-10">
                @foreach($products as $product)
                    
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <a href="{{ route('product.show', ['id' => $product->id]) }} ">
                            <img src="{{ asset('uploads/images/'. $product->imagePath ) }} " alt="">
                            </a>
                            <div class="caption">
                                <h4 class="pull-right">${{$product->price}}</h4>
                                <h4><a href="{{ route('product.show', ['id' => $product->id]) }} ">{{$product->title}}</a>
                                </h4>
                                <p>{{$product->description}} </p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">{{$product->reviews}} reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                        </div>
                       
                    </div>
                    @endforeach
                    

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <h4><a href="#">Have a question?</a>
                        </h4>
                        <p>Please Contact Us</p>
                        <a class="btn btn-primary" target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">Contact</a>
            
                        @if(Auth::guard("admin_user")->user())
                        <a rel="nofollow" class="btn btn-success" href="{{ route('product.create') }}">
                        <span class="glyphicon glyphicon-plus"></span>
                            Add product
                          </a>
                        @endif
                        
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col col-md-4 col-md-offset-4">
                        {!! $products->links() !!}
                    </div>
                </div>
                <div class="row">
                    <hr>
                    

                <div class="col col-md-10 col-md-offset-1">
                <div class="row">
                    <div class="col col-md-4 col-md-offset-4">
                        <h1>Our Offers</h1>
                        <br>
                    </div>
                </div>
                @foreach($offers as $offer)
                    
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <a href="{{ route('offer.show', ['id' => $offer->id]) }} ">
                            <img src="{{ asset('uploads/images/'. $offer->imagePath ) }} " alt="">
                            </a>
                            <div class="caption">
                                <h4 class="pull-right">${{$offer->price}}</h4>
                                <h4><a href="{{ route('offer.show', ['id' => $offer->id]) }} ">{{$offer->title}}</a>
                                </h4>
                                <p>{{$offer->description}} </p>
                                <p> <b> {{$offer->discount_percent}} % Off </b> </p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">{{$offer->reviews}} reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                        </div>
                       
                    </div>
                    @endforeach
                
                </div>
                
            </div>

        </div>

    </div>

    <!-- /.container -->            

@endsection 