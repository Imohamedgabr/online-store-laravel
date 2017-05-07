@extends('admin_main')
<!-- main is the name of the page under views -->

@section('title',' | Manage Products ')

@section('stylesheets')
    
    {!! Html::style('css/adminHome.css') !!}
    

@endsection

@section('content')

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    {{-- @if(Session::has('success'))
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                <div id="charge-message" class="alert alert-success">
                    {{Session::get('success') }}
                </div>
            </div>
        </div>
        @endif --}}
        
    <div class="actions">
      <a rel="nofollow" class="btn btn-default" href="{{ route('product.create') }}">
        <span class="glyphicon glyphicon-plus"></span>
        Add product
      </a>
    </div>
    <div class="filters row">
      <br>
          </div>
              <table class="table">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th class="col-sm-2">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                <tr>
                  <td>
                    <a rel="nofollow" href="#!/product/1">{{$product->title}}</a>
                  </td>
                  <td> {{substr(strip_tags($product->description), 0 ,150)}} {{strlen(strip_tags($product->description)) > 150?"..." :"" }} </td>
                  <td>
                    {{$product->price}}
                    <span class="glyphicon glyphicon-euro" aria-hidden="true"></span>
                  </td>
                  <td>
                    <a rel="nofollow" class="btn btn-warning btn-xs" href="{{ route('product.edit',['id' =>$product->id ]) }}">Edit</a>
                    
                    {!! Form::open(['route' => ['product.delete', $product->id],'class'=>'delete', 'method' => 'DELETE']) !!}

                    {{-- <a rel="nofollow" class="btn btn-danger btn-xs" >Delete</a> --}}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}

                    {!! Form::close() !!}

                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
              <div class="row">
                <div class="col-md-6 col-md-offset-3">
                  {{ $products->links() }}
                </div>
              </div>
        </div>

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

    
</div>

@endsection

@section('scripts')

        {!! Html::script('js/adminHome.js') !!}
        <script>
    $(".delete").on("submit", function(){
        return confirm("Do you want to delete this item?");
    });
</script>

@endsection


