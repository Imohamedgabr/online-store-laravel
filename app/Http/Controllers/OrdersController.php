<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\AdminUser;

class OrdersController extends Controller
{
    public function show()
    {
        $users = array();

        $notifications = AdminUser::find(1)->unreadNotifications;

        // dd($notifications);

        for ($x = 0; $x <= 0; $x++) {
                  foreach($notifications[$x]['data'] as $notification) {
    
                    // dd($notification['name']);
                    array_push($users, $notification['name']);

                    // dd($users);
                   }
                }

    	$orders = Order::paginate(5);
    	$orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        // dd($orders);
    	return view('orders.show')->with('orders',$orders)->with('users',$users);
    }
}
