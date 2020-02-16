<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class UserController extends Controller
{
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
}
