<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/admin/adm-login');
        }
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.user')->with('users', $users);
    }
    /**
     * Login method
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $user->createToken('pettyperry')->accessToken;
            
            return redirect('/admin/adm-dashboard');
        } else {
            return back()->with(['error' => ' Invalid email or password']);
        }
    }

    /**
     * Register method
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'cpassword' => 'required|same:password',
        ]);

        $data = $request->only(['firstname', 'lastname', 'email', 'password']);
        $data['password'] = bcrypt($data['password']);
        
        // Check if user already exit
        if(User::where('email', '=', $data['email'])->exists()){
            return back()->with('error', ' Email already exist!');
        }else {
            $user = new User();
            $user->uuid = Uuid::uuid4();
            $user->firstname = $data['firstname'];
            $user->lastname = $data['lastname'];
            $user->email = $data['email'];
            $user->password = $data['password'];
            $user->is_admin = 1;
            $user->is_author = 1;
            $user->save();
            // Create access token
            $user->createToken('pettyperry')->accessToken;
            // Redirect user
            return redirect('/admin/adm-login')->with('success', ' Registration successful. Please login');
        }
    }

    public function logout(Request $request)
    {
        $value = $request->bearerToken();
        if ($value) {
            $id = (new Parser())->parse($value)->getHeader('jti');
            User::table('oauth_access_tokens')->where('id', '=', $id)->update(['revoked' => 1]);
            $this->guard()->logout();
        }
        Auth::logout();
        return Redirect('/admin/adm-login');
    }
    /**
     * Dashboard
     * Display published and unpublished posts
     * Display all posts
     * Display category
     */
    public function dashboard()
    {
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/admin/adm-login');
        }
        $countAllPosts = Post::all()->count();
        $countPublished = Post::where('status', 1)->get()->count();
        $countUnpublished = Post::where('status', 0)->get()->count();
        $categories = Category::orderBy('created_at', 'desc')->paginate(10);
        return view
            (
                'admin.dashboard', 
                 compact([
                    'countAllPosts', $countAllPosts, 
                    'countPublished', $countPublished,
                    'countUnpublished', $countUnpublished,
                    'categories', $categories
                ])
            );
    }
    /**
     * Profile
     */
    public function profile()
    {
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/admin/adm-login');
        }else{
            return view('admin.profile');
        }
    }
    /**
     * Profile settings
     */
    public function settings($uuid)
    {
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/admin/adm-login');
        }else {
            $user = User::where('uuid',$uuid)->first();
        // Check for correct user
        return view('admin.settings')->with('user', $user);
        }
    }
    /**
     * Update profile settings
     */
    public function profileSettings(Request $request, $id)
    {
        $this->validate($request, [
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'email' => 'required|email',
            'username' => 'required|max:50'
        ]);
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $email = $request->email;
        $username = $request->username;
        $password = $request->password;
    
        // Check query
        try {
            // Get user id
            $updateProfile = User::find($id);
            $updateProfile->firstname = $firstname;
            $updateProfile->lastname = $lastname;
            $updateProfile->email = $email;
            $updateProfile->username = $username;
            $updateProfile->save();
            return redirect('/admin/adm-profile')->with('success', 'Profile Updated');
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error', 'Unable to update profile' .$th);
        }
    }
    /**
     * Set Password
     */
    public function password(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required|min:6',
            'cpassword' => 'same:password'
        ]);

        $password = $request->password;
        $hashPassword = bcrypt($password);
    
        // Check query
        try {
            // Get user id
            $changePassword = User::find($id);
            $changePassword->password = $hashPassword;
            $changePassword->save();
            return redirect('/admin/adm-profile')->with('success', 'Password Changed');
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error', 'Unable to change password' .$th);
        }
    }
    /**
     * Upload profile image
     */
    public function uploadImage(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'required|file|mimes:jpg,png,peg,svg,gif,jpeg',
        ]);
        $image = $request->image;
        try {
            $path = request()->file('image')->store('posts');
            $uploadedImage = User::find($id);
            $uploadedImage->image = $path;
            $uploadedImage->save();
            return redirect('/admin/adm-profile')->with('success', 'Image uploaded');
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error', 'Unable to upload image' .$th);
        }
    }

    /**
     * Edit user form page
     */
    public function userPage($uuid)
    {
        if (Auth::guest()) {
            //is a guest so redirect
        }
        try {
            //code...
            $user = User::where('uuid',$uuid)->first();
            return view('admin.edit_user')->with('user', $user);
        } catch (\Throwable $th) {
            //throw $th;

        }
    }

    /**
     * Create a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        $this->validate($request, [
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $data = $request->only(['firstname', 'lastname', 'email', 'password']);
        $data['password'] = bcrypt($data['password']);
        
        // Check if user already exit
        if(User::where('email', '=', $data['email'])->exists()){
            return back()->with('error', ' Email already exist!');
        }else {
            $user = new User();
            $user->uuid = Uuid::uuid4();
            $user->firstname = $data['firstname'];
            $user->lastname = $data['lastname'];
            $user->email = $data['email'];
            $user->password = $data['password'];            
            $user->save();
            // Create access token
            $user->createToken('pettyperry')->accessToken;
            // Redirect user
            return back()->with('success', ' New User Created Successfully');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/admin/adm-login');
        }
        $user = User::where('uuid',$uuid)->first();
        // Check for correct user
        return view('admin.edit_user')->with('user', $user);
    }

    /**
     * Make the specified resource admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function makeAdmin(Request $request, $id)
    {
        $this->validate($request, [
            'admin' => 'required'
        ]);

        $admin = $request->admin;
    
        // Check query
        try {
            // Get user id
            $admin = User::find($id);
            $admin->is_admin = 1;
            $admin->save();
            return redirect('/admin/adm-user')->with('success', $admin->firstname. ' is now an admin');
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error', 'Unable to make admin' .$th);
        }
    }

    /**
     * Make the specified resource author.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function makeAuthor(Request $request, $id)
    {
        $this->validate($request, [
            'author' => 'required'
        ]);

        $author = $request->author;
    
        // Check query
        try {
            // Get user id
            $author = User::find($id);
            $author->is_author = 1;
            $author->save();
            return redirect('/admin/adm-user')->with('success', $author->firstname. ' is now an author');
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error', 'Unable to make author' .$th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $deleteUser = User::find($id);
        // Check for correct user
        if($deleteUser){
            // Delete Image
            $deleteUser ->delete();
            return redirect('/admin/adm-user')->with('success', 'User was deleted successfuly');
        }else {
            return redirect('/admin/adm-user')->with('success', 'Unable to delete user');
        }
    }
}
