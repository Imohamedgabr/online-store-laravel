@extends('main')
<!-- main is the name of the page under views -->

@section('title',' | Notifications')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
            <h1>Your New Notifications</h1>
            <hr>
            <br><br>
            <div class="panel-body">

            <?php 
                for ($x = 0; $x <= 0; $x++) {
                  // foreach($notifications[$x] as $notification) {
                    
                    
                    echo'</div>';
                    echo'<div class="panel panel-default">
                        <div class="panel-body">
                        <span class="badge">'
                        .  $users[$x] . '</span>' . ' has bought a new item' .'</div> 
                        <div class="panel-footer clearfix">
                            <div class="pull-right">
                                <a href="#" class="btn btn-primary">Remove from Notifications</a>
                               
                            </div>
                        </div>
                    </div><br><br><br><br><br><br><br><br><br>';
                } 
            ?>
                {{-- 
                @foreach($notifications as $notification)
                    <div class="panel panel-default">
                        <ul class="list-group">
                            @foreach($notification->order->cart->items as $item)
                              <li class="list-group-item">
                              <span class="badge">{{$item['price']}} $ </span>
                              {{$item['item']['title'] }} <span class="badge">Amount: {{$item['qty'] }} Unit/Units</span>

                              </li>

                             @endforeach
                         </ul>

                    </div>

                   
                <hr>
                @endforeach --}}

            </div>
        </div>
    </div>
</div>
@endsection
