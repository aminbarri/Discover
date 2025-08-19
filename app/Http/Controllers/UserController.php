<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Mail\ProfileMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class UserController extends Controller
        {

        public function showLoginForm() {
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


        public function show(){
             // Retrieve the logged-in user
             $user = Auth::user();
            return view('admin.dashboard', compact('user')); // Pass user data to the view
        }


        public function create(){
            return view('auth.signup');
        }



        private function  sendConfirmation($user){
            Mail::to($user->email)->send(new ProfileMail($user));

        }



        public function  verifyemail(String $hash){
            $decodedHash = base64_decode($hash);
            $parts = explode('//', $decodedHash);
            [$date, $id] = $parts;
            $user = User::findOrFail($id);
            $name= $user->name;
            $email= $user->email;


            $user->fill([
                'email_verified_at'=>now()
            ])->save();

          return view('admin.emails.verify',compact('name','email'));
        }


        public function store(Request $request){
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


        $this->sendConfirmation($user);


        return redirect()->route('login')->with('success', 'Account created successfully.');
}


    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password','type');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = Auth::user();
        if ($user->type == User::ROLE_ADMIN) {
            return redirect()->intended('/dashboard');
        } else {
            return redirect()->intended('/');
        }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

   public function update_img(Request $request, $id)
    {
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);


        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $folderPath = public_path('img/profile/' . $id);

            // if folder exists, clear old files
            if (File::exists($folderPath)) {
                File::cleanDirectory($folderPath); // removes all files inside but keeps the folder
            } else {
                mkdir($folderPath, 0755, true);
            }

            $imgName = time() . '_1.' . $img->getClientOriginalExtension();
            $img->move($folderPath, $imgName);

            $img_profile = 'img/profile/' . $id . '/' . $imgName;

            // save to DB
            User::where('id', $id)->update(['img' => $img_profile]);
        }


        return redirect()->to('/profile')->with('success', 'Image updated successfully');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }
}
