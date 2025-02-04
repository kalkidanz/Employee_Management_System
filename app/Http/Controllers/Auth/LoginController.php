<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
   

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|max:255',
            'password' => 'required|min:8',
        ]);
      

        if (Auth::attempt($request->only('username', 'password'))) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['username' => 'Invalid Username or Password'])->withInput();
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
} 
