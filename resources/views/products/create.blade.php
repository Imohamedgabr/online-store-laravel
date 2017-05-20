@extends('main')

@section('title')
    Create Product
@endsection

@section('stylesheets')
	
	{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Product</h1>
			<hr>

			{{-- we tell the form to allow file uploads --}}
			{!! Form::open(array('route'=>'product.store', 'data-parsley-validate' => '','files' =>true)) !!}

				{{ Form::label('title', 'Title:') }}
				{!! Form::text('title', null, [
	              'class'                         => 'form-control',
	              'required'                      => 'required',
	              'placeholder'                   => 'Title',
	              'data-parsley-required-message' => 'Title is required',
	              'data-parsley-trigger'          => 'change focusout',
	              'data-parsley-minlength'        => '5',
	              'data-parsley-maxlength'        => '250'
	              ]) !!}

	             {{ Form::label('category_id', 'Category:') }}
	             <select class="form-control" name="category_id">
	             	@foreach($categories as $category)
						<option value="{{$category->id }} ">{{$category->name }} </option>
	             	@endforeach
	             </select>

				{{ Form::label('price', 'Price:') }}
				{!! Form::text('price', null, [
	              'class'                         => 'form-control',
	              'required'                      => 'required',
	              'placeholder'                   => 'Price',
	              'data-parsley-required-message' => 'Price is required',
	              'data-parsley-trigger'          => 'change focusout',
	              'data-parsley-maxlength'        => '250'
	              ]) !!}

	            {{ Form::label('Quantity', 'Quantity:') }}
				{!! Form::text('quantity', null, [
	              'class'                         => 'form-control',
	              'placeholder'                   => 'Quantity',
	              'data-parsley-trigger'          => 'change focusout',
	              'data-parsley-maxlength'        => '250'
	              ]) !!}


				 {{-- the image --}}

				{{ Form::label('photo', "Upload featured Image: (Required) ") }}
				{!! Form::file('photo', [
	              'class'                         => 'form-control',
	              'required'                      => 'required',
	              'data-parsley-required-message' => 'Image is required'
	              ]) !!}
				


				{{ Form::label('description', "Product Description:") }}
				{!! Form::textarea('description', null, [
	              'class'                         => 'form-control',
	              'required'                      => 'required',
	              'placeholder'                   => 'description',
	              'data-parsley-required-message' => 'description is required',
	              'data-parsley-trigger'          => 'change focusout',
	              'data-parsley-minlength'        => '2'
	              ]) !!}


				{{ Form::submit('Create Product', array('class' => 'btn btn-success btn-lg btn-block top-margin-space')) }}
				
				{{-- {{ csrf_field() }}
				<input type="hidden" name="stripeToken"> --}}
			{!! Form::close() !!}
		</div>
	</div>

@endsection


@section('scripts')

    {!! Html::script('js/parsley.min.js') !!}

@endsection