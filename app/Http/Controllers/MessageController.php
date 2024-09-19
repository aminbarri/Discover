<?php

namespace App\Http\Controllers;
use App\Models\message;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

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
           ->with('message','the message has been Deleted');
       }
    
}
