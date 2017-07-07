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
                    <div class="panel-body">
                
                @foreach($orders as $order)
                    <div class="panel panel-default">
                        <ul class="list-group">
                        <span class="badge">Buyer Name: {{$order->name }} <br><br> Buyer ID: {{$order->id }}</span>
                            @foreach($order->cart->items as $item)
                              <li class="list-group-item">
                              <span class="badge">{{$item['price']}} $ </span>
                              {{$item['item']['title'] }} <span class="badge">Amount: {{$item['qty'] }} Unit/Units</span>

                              </li>

                             @endforeach
                         </ul>

                    </div>

                    <div class="well panel-footer">
                        <strong>Total Price:  $ {{$order->cart->totalPrice}} </strong>
                    </div>
                <hr>
                @endforeach
            {{ $orders->links() }}
            </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
     <!-- /.page-wrapper -->

@endsection

@section('scripts')

        {!! Html::script('js/adminHome.js') !!}

@endsection
