@extends('main')
<!-- main is the name of the page under views -->

@section('title',' | Shopping Cart')

@section('stylesheets')
	<link rel="stylesheet" href="{{ URL::asset('css/shopping-cart.css') }}" />
@endsection



@section('content')
	<div class="container">
	@if(Session::has('cart'))
			<div class="row productRow">
				<div class="col-sm-6  col-md-6 col-md-offset-3 col-sm-offset-3">
					<ul class="list-group prob">
						@foreach($products as $product)
							<li class="list-group-item">
								<span class="badge"> {{$product['qty'] }} </span>
								<strong> {{$product['item']['title'] }} </strong>
								<span class="label label-success">${{$product['price'] }}</span>
								<div class="btn-group" >
									<button class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" > Action <span class="caret"></span> </button>
									<ul class="dropdown-menu">
										<li><a href="{{-- {{ route('product.reduceByOne',['id'=>$product['item']['id']] ) }} --}} ">Reduce by 1</a></li>
										<li><a href="{{-- {{ route('product.remove',['id'=>$product['item']['id']] ) }} --}} ">Clear All</a></li>
									</ul>
								</div>
							</li>

						@endforeach
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6  col-md-6 col-md-offset-3 col-sm-offset-3">
					<strong>Total Price: ${{$totalPrice }} </strong>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-sm-6  col-md-6 col-md-offset-3 col-sm-offset-3">
					<a type="button" href="{{ route('checkout') }} " class="btn btn-success">Check Out</a>
				</div>
			</div>

		@else
		<div class="row spacingTop">
				<div class="col-sm-6  col-md-6 col-md-offset-3 col-sm-offset-3">
				<p class="biggerSize"><strong>No items in cart please add some items </strong> </p>
				</div>
			</div>

		@endif
		</div>
@endsection

