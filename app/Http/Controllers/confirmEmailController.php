<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ProfileMail;
use Mail;


class confirmEmailController extends Controller
{
    public function index(Request $request) {
        //$request->session()->forget('compteur');
      //  Mail::to('barrimohamed01@gmail.com')->send(new profileMail('amin', 'barrimohamed01@gmail.com'));
        return view('main');
    }
}
