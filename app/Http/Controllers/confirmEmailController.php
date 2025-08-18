<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ProfileMail;
use Illuminate\Support\Facades\Mail ;
use App\Models\User;

class confirmEmailController extends Controller
{
    public function index(Request $request) {
        return 'hello word';
    }
    public function send_confirmation($email){
        $user = User::where('email', $email)->firstOrFail();
         Mail::to($email)->send(new ProfileMail($user));
        return redirect()->to('/profile')->with('success', 'Confirmation email send successufly.');
    }
}
