@extends('main')

@section('title')
    Create A review
@endsection

@section('stylesheets')
	
	{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

<div id="page-wrapper">
  <div class="container-fluid">

	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			<br>
			<br>
			<h1>Create a review</h1>
			<hr>
			
			<br>
			<br>
			{{-- we tell the form to allow file uploads --}}
			{!! Form::open(array('route'=>'review.store', 'data-parsley-validate' => '')) !!}

				{{ Form::label('content', 'Content:') }}
				{!! Form::textarea('content', null, [
	              'class'                         => 'form-control',
	              'required'                      => 'required',
	              'placeholder'                   => 'content',
	              'data-parsley-required-message' => 'content is required',
	              'data-parsley-trigger'          => 'change focusout',
	              'data-parsley-minlength'        => '3',
	              'data-parsley-maxlength'        => '250'
	              ]) !!}
				
				<br>
				<br>
	            {{ Form::label('rating', 'Rating:') }}
				
				{{ Form::select('rating', [0,1, 2, 3,4,5], null, ['class' => 				'form-control',
					'required' =>			 'required'
				]) }}
				

				<input name="product_id" type="hidden" value="{{$product_id}} ">

				<br>
				<br>
				{{ Form::submit('Leave a review', array('class' => 'btn btn-success btn-lg btn-block top-margin-space')) }}
				
				
			{!! Form::close() !!}
		</div>
	</div>
</div>
</div>


@endsection


@section('scripts')

    {!! Html::script('js/parsley.min.js') !!}

@endsection