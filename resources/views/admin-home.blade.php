@extends('admin_main')
<!-- main is the name of the page under views -->

@section('title',' | Admin Profile')

@section('stylesheets')
    
    {!! Html::style('css/adminHome.css') !!}
    

@endsection

@section('content')
  
            
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Admin Dashboard</h1>
                        <br>
                        <b>Welcome To Admin Dashboard</b>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>


@endsection

@section('scripts')

        {!! Html::script('js/adminHome.js') !!}

@endsection
