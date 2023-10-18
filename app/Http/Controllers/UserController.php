<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function homePage(): View
    {
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        return view('home', ['auth'=>false, 'role'=>'guest']);
    }
    
    public function registerPage(): View
    {
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        return view('register', ['auth'=>false, 'role'=>'guest']);
    }

    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'name'=>'required|string',
            'username'=>'required|string',
            'address'=>'required|max:250',
            'phone_number'=>'required|numeric',
            'role'=>'required|in:admin,user',
            'ktp'=>'required',
            'npwp'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|same:confpass',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'role' => $request->role,
            'ktp' => $request->ktp,
            'npwp' => $request->npwp,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('outletRegister');
    }

    public function registerOutletPage(): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $users = User::all();

        if($auth){
            $role = Auth::user()->role;
        }

        return view('outletRegister', compact('users'), ['auth'=>false, 'role'=>'guest']);
    }

    public function registerOutlet(Request $request): RedirectResponse
    {
        $this->validate($request,[
            'outlet_name'=>'required',
            'outlet_phone_number'=>'required|numeric',
            'outlet_address'=>'required',
        ]);

        Outlet::create([
            'outlet_name' => $request->outlet_name,
            'outlet_phone_number' => $request->outlet_phone_number,
            'outlet_address' => $request->outlet_address
        ]);

        return redirect('login');
    }

    public function loginPage()
    {
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        return view('login', ['auth'=>false, 'role'=>'guest']);
    }

    public function login(Request $request)
    {
        $info = $request->only('email', 'password');

        $result = Auth::attempt($info);

        $role = 'guest';
        if($result){
            $role = Auth::user()->role;
        }

        $user = User::where('email', $request->email)->first();

        return view('dashboard', ['auth'=>$result, 'role'=>$role]);
    }

    public function logout()
    {
        Auth::logout();

        return view('login', ['auth'=>false, 'role'=>'guest']);
    }

    public function profilePage()
    {
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        return view('profile.index', ['auth'=>$auth, 'role'=>$role]);
    }

    public function editProfilePage(Request $request)
    {
        $auth = Auth::check();
        $role = 'guest';
        $user = Auth::user();

        if($auth){
            $role = Auth::user()->role;
        }

        return view('profile.edit', ['auth'=>$auth, 'role'=>$role]);
    }

    public function changePasswordPage(Request $request)
    {
        $auth = Auth::check();
        $role = 'guest';
        $user = Auth::user();

        if($auth){
            $role = Auth::user()->role;
        }

        return view('profile.changePassword', ['auth'=>$auth, 'role'=>$role]);
    }
}
