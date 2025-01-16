<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ProfileMail;
use Mail;


class confirmEmailController extends Controller
{
    public function index(Request $request) {
        return view('main');
    }
}
