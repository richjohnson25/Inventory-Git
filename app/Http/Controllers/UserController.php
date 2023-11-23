<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Outlet;
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

        return redirect()->route('registerOutletPage');
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
        $request->validate([
            'user_id'=>'required',
            'outlet_name'=>'required',
            'outlet_phone_number'=>'required|numeric',
            'outlet_address'=>'required|max:250',
        ]);

        Outlet::create([
            'user_id' => $request->user_id,
            'outlet_name' => $request->outlet_name,
            'outlet_phone_number' => $request->outlet_phone_number,
            'outlet_address' => $request->outlet_address
        ]);

        return redirect()->route('loginPage')->with('info', 'Pendaftaran pengguna baru berhasil!');
    }

    public function loginPage(): View
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
        $info = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $role = 'guest';

        if(Auth::attempt($info))
        {
            $request->session()->regenerate();
            $role = Auth::user()->role;
            return redirect()->route('dashboardPage');
        }
    }

    public function logout()
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return view('login', ['auth'=>false, 'role'=>'guest']);
    }

    public function profilePage(): View
    {
        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }

        return view('profile.index', ['auth'=>$auth, 'role'=>$role]);
    }

    public function editProfilePage(): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $user = Auth::user();

        if($auth){
            $role = Auth::user()->role;
        }

        return view('profile.edit', ['auth'=>$auth, 'role'=>$role]);
    }

    public function editProfile(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $request->validate([
            'name'=>'required|string',
            'username'=>'required|string',
            'email'=>'required|email|unique:users',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
        ]);

        return redirect()->route('profilePage')->with('success', 'Profil berhasil diubah!');
    }

    public function changePasswordPage(): View
    {
        $auth = Auth::check();
        $role = 'guest';
        $user = Auth::user();

        if($auth){
            $role = Auth::user()->role;
        }

        return view('profile.changePassword', ['auth'=>$auth, 'role'=>$role]);
    }

    public function changePassword(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $request->validate([
            'password'=>'required|min:6|same:confpass',
        ]);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Berhasil mengubah kata sandi!');
    }
}
