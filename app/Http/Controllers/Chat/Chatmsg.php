<?php

namespace App\Http\Controllers\Chat;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Msg;
use App\Models\User;
use App\Models\Frnd;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class Chatmsg extends Controller
{
    public function chatmsg(Request $request){
        $receiver_id=User::where('name',$request->receiver_name)->first()->id;
        $sender_id=auth()->user()->id;
        $isFriend = Frnd::where(function ($query) use ($sender_id, $receiver_id) {
            $query->where('frnd_request_sender_id', $sender_id)
                  ->where('frnd_request_receiver_id', $receiver_id)
                  ->where('status', 'accepted');
        })
        ->orWhere(function ($query) use ($sender_id, $receiver_id) {
            $query->where('frnd_request_sender_id', $receiver_id)
                  ->where('frnd_request_receiver_id', $sender_id)
                  ->where('status', 'accepted');
        })
        ->exists();
    if($isFriend){
        return view('Chat.chatbox',compact('receiver_id','sender_id'));}
        else{
            return view('Error.Ermsg');
        }
   
        
    }
    public function savemsg(Request $request){
        $chat = new Msg();
        $chat->sender_id = auth::user()->id;
        $chat->receiver_id = $request->receiver_id;
        $chat->msg = Crypt::encryptString($request->msg);
        $chat->status = 'unread';
        
        $chat->save();
        $messages = Msg::where('sender_id',auth::user()->id)->where('receiver_id', $chat->receiver_id)->get();
     //  dd($messages);
     return view('Test.test', compact('messages'));
        

    }
    
}
