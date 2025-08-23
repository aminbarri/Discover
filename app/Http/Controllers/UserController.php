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
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

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
        try {
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $folderPath = public_path('img/profile/' . $id);

            if (File::exists($folderPath)) {
                File::cleanDirectory($folderPath);
            } else {
                mkdir($folderPath, 0755, true);
            }

            $imgName = time() . 'img_profile_1.' . $img->getClientOriginalExtension();
            $img->move($folderPath, $imgName);

            $img_profile = 'img/profile/' . $id . '/' . $imgName;

            $updated = User::where('id', $id)->update(['img' => $img_profile]);
        }

        if ($updated) {
            return redirect()->to('/profile')->with('success', 'Image updated successfully');
        } else {
            return redirect()->back()->with('error', 'No changes were made.');
        }
        }catch (\Exception $e) {
            Log::error('Image update failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong, please try again.'. $e->getMessage());
        }
    }

    public function update($id){
       $user= User::where('id',$id)->first();
        return view('admin.client.updateClient',['user'=>$user]);
    }
    public function edit(Request $request,$id){
        $request->validate([
            'name' => 'string|max:255',
            'email' => 'string|email|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $updateData = [
        'name' => $request->name,
        'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
        }


        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $folderPath = public_path('img/profile/' . $id);

            if (File::exists($folderPath)) {
                File::cleanDirectory($folderPath);
            } else {
                mkdir($folderPath, 0755, true);
            }

            $imgName = time() . 'img_profile_1.' . $img->getClientOriginalExtension();
            $img->move($folderPath, $imgName);

            $img_profile = 'img/profile/' . $id . '/' . $imgName;

            $updateData['img']= $img_profile;
        }
        if($request->email){
            $user = User::where('id',$id)->first();
            $this->sendConfirmation($user);
        }
        User::where('id',$id)->update($updateData);
        return redirect()->to('/showclient')->with('success', ' updated successfully');
    }
    public function destroy($id){
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'User deleted successfully.');
        }

        return redirect()->back()->with('error', 'User not found.');
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }
}
