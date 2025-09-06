<?php

namespace App\Http\Controllers;
use App\Models\message;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Mail\ProfileMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail ;
use App\Mail\replyMail;
use Illuminate\Support\Facades\Auth;


class messageController extends Controller
{

    public function show(){
        $messages = DB::select('select * from messages');;
        return view('admin.message.message',compact('messages'));
    }

    public function index($id_mess){
        $messages = Message::where('id_mess',$id_mess)->first();
        return view('admin.message.showmsg',compact('messages'));
    }
    public function create(){
        return view('client.contact');
    }
    public function store(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|string|email|max:30',
            'sujet' => 'required|string|max:100',
            'content' => 'required|string|max:500',
        ]);

        Message::create($validatedData);

        return redirect()->back()->with('success', 'Your message has been sent!');
    }

    public function destroy($id_mess){
        MESSAGE::where('id_mess' , $id_mess)
        ->delete();
           return redirect()->to('/message')
           ->with('success','the message has been Deleted');
    }

    public function reply($email,Request $request,$id_message_reply,$sujet){
        $message = new Message();
        $message->content = $request->content;
        $message->messages_reply = $id_message_reply;
        $message->sujet = 'Relpy to '.$sujet;
        $message->email = Auth::user()->email;
        $message->name = Auth::user()->name;
         Mail::to($email)->send(new replyMail($email,$request->content,$id_message_reply));
        $message->save();
         return redirect()->back()->with('success', 'Your reply has been sent!');
    }

}
