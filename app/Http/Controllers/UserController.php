<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
        {
            
            public function showLoginForm()
        {
            return view('auth.login');
        }

       
        public function dashboard(){
            return view('admin.dashboard');
        }
        public function showclient(){
            $client =DB::table('users')->where('type', 'user')->get();;
            return view('admin.client.showclient',compact('client'));
        }
        public function profile(){
            $profile =DB::table('users')->where('id',Auth::id())->first();
            return view('admin.admin.profile',compact('profile'));
        }
        public function show()
        {
             // Retrieve the logged-in user
             $user = Auth::user();
            return view('admin.dashboard', compact('user')); // Pass user data to the view
        }
        public function create()
        {
            return view('auth.signup');
        }
        public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('success', 'Account created successfully.');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password','type');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = Auth::user();
        if ($user->type == User::ROLE_ADMIN) {
            return redirect()->intended('/profile');
        } else {
            return redirect()->intended('/');
        }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
