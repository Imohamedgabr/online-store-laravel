@extends('main')

@section('title')
    Edit Product
@endsection

@section('stylesheets')
	
	{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')


		{{-- we will make a model object and bind the model object to the form and laravel will auto fill it in the form  --}}
<div class="container">
	<div class="row">
			<h1>Edit Product</h1>
			<hr>
			<div class="col-md-8">
			{!! Form::model($product,['route' => ['product.update', $product->id],'data-parsley-validate'=>'', 'method' =>'PUT','files'=> true]) !!}
			
				{{ Form::label('title', 'Title:') }}
				{{-- {{ Form::text('title', null, ["class" => 'form-control input-lg', 'required' => '']) }} --}}

	       		{!! Form::text('title', null, [
	              'class'                         => 'form-control',
	              'required'                      => 'required',
	              'placeholder'                   => 'Title',
	              'data-parsley-required-message' => 'Title is required',
	              'data-parsley-trigger'          => 'change focusout',
	              'data-parsley-minlength'        => '2',
	              'data-parsley-maxlength'        => '250'
	              ]) !!}


				{{ Form::label('price', 'price:', ['class' => 'form-spacing-top']) }}
				{{-- {{ Form::text('price', null, ['class' => 'form-control','required' => '']) }} --}}
				{!! Form::text('price', null, [
	              'class'                         => 'form-control',
	              'required'                      => 'required',
	              'placeholder'                   => 'Title',
	              'data-parsley-required-message' => 'Title is required',
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
				{{Form::label('photo', 'Update Image: (Required)' , ['class' => 'top-margin-space']) }}
				{{-- {{ Form::file('featured_image') }} --}}
				{!! Form::file('photo', [
	              'class'                         => 'form-control',
	              'required'                      => 'required',
	              'data-parsley-required-message' => 'Image is required'
	              ]) !!}



				
				{{ Form::label('description', "description:", ['class' => 'top-margin-space']) }}
				{{-- {{ Form::textarea('description', null, ['class' => 'form-control','required' => '']) }} --}}

				{!! Form::textarea('description', null, [
	              'class'                         => 'form-control',
	              'required'                      => 'required',
	              'placeholder'                   => 'description',
	              'data-parsley-required-message' => 'description is required',
	              'data-parsley-trigger'          => 'change focusout',
	              'data-parsley-minlength'        => '2'
	              ]) !!}
			
			</div>

			<div class="col-md-4">
				<div class="well">
					<dl class="dl-horizontal">
						<dt>Create At:</dt>
						<dd>{{ date('M j, Y h:ia', strtotime($product->created_at)) }}</dd>
					</dl>

					<dl class="dl-horizontal">
						<dt>Last Updated:</dt>
						<dd>{{ date('M j, Y h:ia', strtotime($product->updated_at)) }}</dd>
					</dl>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							{!! Html::linkRoute('product.index', 'Cancel', array($product->id), array('class' => 'btn btn-danger btn-block')) !!}
						</div>
						<div class="col-sm-6">
							{{Form::submit('Save Changes',['class' => 'btn btn-success btn-block'])}}
							
						</div>
					</div>

				</div>
			</div>
			{!! Form::close() !!}

		
		<br>
	</div>

</div>
@endsection

@section('scripts')

    {!! Html::script('js/parsley.min.js') !!}

@endsection

{{-- 
{!! Form::label('email', 'Email address:') !!}
	          {!! Form::email('email', null, [
	              'class' => 'form-control',
	              'placeholder'                   => 'email@example.com',
	              'required'                      => 'required',
	              'data-parsley-required-message' => 'Email name is required',
	              'data-parsley-trigger'          => 'change focusout',
	              'data-parsley-class-handler'    => '#email-group'
	              ]) !!} --}}