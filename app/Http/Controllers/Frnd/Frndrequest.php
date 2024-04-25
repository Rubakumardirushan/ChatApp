<?php

namespace App\Http\Controllers\Frnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frnd;
use App\Models\User;
use App\Mail\Sendrequest;
use App\Mail\Sendaccept;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
class Frndrequest extends Controller
{
    public function frndlist(){
        $loginuser=auth()->user()->id;
        $userIds = User::where('id', '!=', $loginuser)->pluck('id');
        $frndRequestsSent = Frnd::where('frnd_request_sender_id', $loginuser)->pluck('frnd_request_receiver_id');
        $frndRequestsReceived = Frnd::where('frnd_request_receiver_id', $loginuser)->pluck('frnd_request_sender_id');
        $frndRequests = $frndRequestsSent->merge($frndRequestsReceived);
       $users = User::whereIn('id', $userIds)->whereNotIn('id', $frndRequests)->pluck('name');
        return view('Frnd.userlist',compact('users'));


    }
    public function sendfrndrequest(Request $request){
        $id =User::where('name',$request->username)->first()->id;
        $loginuser=auth()->user()->id;
        $frnd = new Frnd();
        $frnd->frnd_request_sender_id = $loginuser;
       $frnd->frnd_request_receiver_id = $id;
       $frnd->save();
       $email = User::where('name',$request->username)->pluck('email');
         $sender = Auth::user()->name;
            $receiver =$request->username;
            \Log::info('Email to send request: ' . $email);
           // dd($request->username);
       Mail::to($email)->send(new Sendrequest($sender,$receiver));
     return redirect('frndlist');
      
      
    }


    public function viewfrndrequest(){
        $loginuser=auth()->user()->id;
        $frndRequestsReceived = Frnd::where('frnd_request_receiver_id', $loginuser)->where('status','pending')->pluck('frnd_request_sender_id');
        $frndrequestsendername=User::whereIn('id',$frndRequestsReceived)->pluck('name');
        return view('Frnd.frndrequest',compact('frndrequestsendername'));
    }

public function acceptfrndrequest(Request $request){
    $id =User::where('name',$request->username)->first()->id;
    $loginuser=auth()->user()->id;
    $frnd = Frnd::where('frnd_request_sender_id',$id)->where('frnd_request_receiver_id',$loginuser)->first();
    $frnd->status = 'accepted';
    $frnd->frnd_request_accepted_at = now();
    $frnd->save();
    $email = User::where('id',$id)->pluck('email');
    $sender = Auth::user()->name;
    $receiver =$request->username;
    Mail::to($email)->send(new Sendaccept($sender,$receiver));
    return redirect('frndrequest');


}
public function rejectfrndrequest(Request $request){
    $id =User::where('name',$request->username)->first()->id;
    $loginuser=auth()->user()->id;
    $frnd = Frnd::where('frnd_request_sender_id',$id)->where('frnd_request_receiver_id',$loginuser)->first();
    $frnd->status = 'rejected';
    $frnd->delete();
    return redirect('frndrequest');
}
/*
public function viewfrnd(){
    $loginuser=auth()->user()->id;
    $frndRequestsSent = Frnd::where('frnd_request_sender_id', $loginuser)->where('status','accepted')->pluck('frnd_request_receiver_id');
    $frndRequestsReceived = Frnd::where('frnd_request_receiver_id', $loginuser)->where('status','accepted')->pluck('frnd_request_sender_id');
    $frndRequests = $frndRequestsSent->merge($frndRequestsReceived);
   // dd($frndRequests);
    if ($frndRequests->isEmpty()) {
        // Handle the case where $frndRequests is empty
        // For example, return a message or redirect to a different page
        return redirect('frndlist');
    }
    $frndrequestsendername=User::where('id',$frndRequests)->first()->pluck('name');
    $active_status=User::where('name',$frndrequestsendername)->pluck('active_status');
    $last_seen=User::where('name',$frndrequestsendername)->pluck('last_seen');
    return view('Frnd.myfrnd',compact('frndrequestsendername','active_status','last_seen'));
}
*/
public function viewfrnd(){
    $loginuser = auth()->user()->id;
    
    $frndRequestsSent = Frnd::where('frnd_request_sender_id', $loginuser)
                            ->where('status','accepted')
                            ->pluck('frnd_request_receiver_id');

    $frndRequestsReceived = Frnd::where('frnd_request_receiver_id', $loginuser)
                                ->where('status','accepted')
                                ->pluck('frnd_request_sender_id');

    $frndRequests = $frndRequestsSent->merge($frndRequestsReceived);

    if ($frndRequests->isEmpty()) {
        // Redirect to a different page or show a message if no friend requests are found
        return redirect('frndlist');
    }

    // Fetching names, active statuses, and last seen times for the friends
    $frndRequestSenderIds = $frndRequests->all(); // Extracting IDs from the collection
    $friends = User::whereIn('id', $frndRequestSenderIds)->get(); // Fetching users corresponding to the IDs

    $frndrequestsendername = $friends->pluck('name');
    $active_status = $friends->pluck('active_status');
    $last_seen = $friends->pluck('last_seen');

    return view('Frnd.myfrnd', compact('frndrequestsendername', 'active_status', 'last_seen'));
}

}
