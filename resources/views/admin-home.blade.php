@extends('main')
<!-- main is the name of the page under views -->

@section('title',' | User Profile')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
            <h1>Admin Dashboard </h1>
            <hr>
            
            <div class="panel-body">
                <h2>Welcome {{ Auth::guard('admin_user')->user()->name }}</h2>
                <h3>This is our Admin profile page
                you have the authority to create and add products and delete them
                please becareful while you are doing this because this might delete products which is important
                thank you!</h3>
                <h3>This is designed as a trial version of an online store.
                </h3>
                <h3>This can be modified as you wish</h3>
                
            </div>
        </div>
    </div>
</div>
@endsection
