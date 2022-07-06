<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function loginCheck(AdminAuthRequest $request){
        $request = $request->merge(['is_admin' => 1]);
        if (Auth::attempt($request->only('email', 'password', 'is_admin'))){
            $request->session()->regenerate();
            return redirect()->intended('admin');
        }
        return back()->withErrors(['error' => 'E-Posta veya parola hatalı'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
