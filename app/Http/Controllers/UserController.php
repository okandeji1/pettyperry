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
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/admin/adm-login');
        }
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(){
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
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $User = User::where('uuid',$uuid)->first();
        $categories = Category::all();
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/admin/adm-login');
        }
        // Check for correct user
        return view('admin.edit_User', compact(['User', $User, 'categories', $categories]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this -> validate($request, [
            'header' => 'required',
            'content' => 'required'
        ]);
        // Handle file upload
        if ($request->hasFile('image')) {
            // Get file name with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just file name
            $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just the extension
            $extension = $request->file('image')->getClientOriginalExtension();
            // File nameto store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            // Upload image
            \Image::make($request->file('image'))->save(public_path('Users/').$fileNameToStore);
        }
        $header = $request->header;
        $content = $request->content;
        $category = $request->category;
        // Update User
        $updateUser = User::find($id);
        if($updateUser){
            $updateUser->header = $header;
            $updateUser->content = $content;
            if ($request->hasFile('image')) {
                $updateUser->image = $fileNameToStore;
            }
                $content = $request->content;
            if($category !== null){
                $getCategory = Category::where('name', '=', $category)->firstOrFail();
                $getCategory_id = $getCategory->id;
                $updateUser->category_id = $getCategory_id;
                $updateUser->save();
                return redirect('/admin/adm-User')->with('success', 'User Updated');
            }else {
                $updateUser->save();
                return redirect('/admin/adm-User')->with('success', 'User Updated');
            }
        }else {
            return redirect('/admin/adm-User')->with('error', 'Unable to update User');
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
            Storage::delete('users/'. $deleteUser->image);
            $deleteUser ->delete();
            return redirect('/admin/adm-user')->with('success', 'User was deleted successfuly');
        }else {
            return redirect('/admin/adm-user')->with('success', 'Unable to delete user');
        }
    }
}
