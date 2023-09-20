<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function homePage(){
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        return view('home');
    }
    
    public function registerPage(){
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        return view('register', ['auth'=>false, 'role'=>'guest']);
    }

    public function register(Request $request){
        $this->validate($request,[
            'username'=>'required',
            'phone_number'=>'required',
            'role'=>'required',
            'ktp'=>'required',
            'npwp'=>'required',
            'email'=>'required|unique:posts',
            'password'=>'required|confirmed|min:5',
        ]);

        $user = new User;

        $user->username = $request->username;
        $user->phone_number = $request->phone_number;
        $user->role = $request->role;
        $user->ktp = $request->ktp;
        $user->npwp = $request->npwp;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        return view('outletRegister');
    }

    public function outletRegisterPage(){
        return view('outletRegister');
    }

    public function registerOutlet(Request $request){
        $this->validate($request,[
            'outlet_name'=>'required',
            'outlet_phone_number'=>'required',
            'outlet_address'=>'required',
        ]);

        $outlet = new Outlet;

        $outlet->outlet_name = $request->outlet_name;
        $outlet->outlet_phone_number = $request->outlet_phone_number;
        $outlet->outlet_address = $request->outlet_address;

        $outlet->save();

        return view('login');
    }

    public function loginPage(){
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        return view('login', ['auth'=>false, 'role'=>'guest']);
    }

    public function login(Request $request){
        $info = $request->only('email', 'password');

        $result = Auth::attempt($info);

        $role = 'guest';
        if($result){
            $role = Auth::user()->role;
        }

        return view('dashboard', ['auth'=>$result, 'role'=>$role]);
    }

    public function logout(){
        Auth::logout();

        return view('login', ['auth'=>false, 'role'=>'guest']);
    }
}
