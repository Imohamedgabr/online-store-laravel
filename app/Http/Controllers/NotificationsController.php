<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminUser;

class NotificationsController extends Controller
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

   		
   		return view('notification.show')->with('users',$users);
   	}
}
