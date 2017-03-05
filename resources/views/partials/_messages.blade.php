@if (Session::has('success')) 
{{--  success is the name of the session we gave in create.blade --}} 
	
	<div class="alert alert-success" role="alert">
		<strong>Success:</strong> {{Session::get('success')}}
	</div>

{{--  content --}}

@endif

@if(count($errors) > 0)

	<div class="alert alert-danger" role="alert">
		<strong>Errors:</strong>
		<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
		</ul>
	</div>

@endif