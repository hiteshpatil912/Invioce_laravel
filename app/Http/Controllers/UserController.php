<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

use function Psy\debug;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\InvoiceProductRequest;

class UserController extends Controller
{
    public function Register()
    {
        return view('user.register');
    }
    
    public function Registerstore(Request $request)
    {
        // Log::debug($request);
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Log::debug($request);
        User::create([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect('login')->with('sucess your account');
    }
    public function Login()
    {
        return view('user.login');
    }
    public function Loginstore(Request $request)
    {
        // return ('hello hitesh!!');
      Log::debug($request);
      $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
    $credentials = $request->only('email', 'password');
    // dd($credentials);
      return redirect()->intended('dashboard')
        ->withSuccess('You have Successfully loggedin');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function invoice()
    {
        return view('invoice');
    }
}
