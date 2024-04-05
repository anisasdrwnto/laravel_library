<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            if(Auth::user()->role == 'admin') {
                return redirect()->route('admin.home');
            } else if(Auth::user()->role == '')  {
                return redirect()->route('user.home');
                // Redirect to admin or other role home page
                // return redirect()->route('admin.home');
                // Adjust this according to your application flow
            }
        } else {
            return back()->withErrors(['username' => 'Username or password incorrect']);
        }
        // $credentials = $request->only('username', 'password');

        // if (Auth::attempt($credentials)) {
        //     return redirect()->intended('/home');
        // }else{
        //     return back()->withErrors(['username' => 'Username or password incorrect']);
        // }

        
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,petugas',
        ]);

       $user = new User();
       $user->name = $validatedData['name'];
       $user->username = $validatedData['username'];
       $user->password = Hash::make($validatedData['password']);
       $user->role = $validatedData['role'];
       $user->save();


        Auth::login($user); // Otomatis login setelah registrasi

        return redirect('/home'); // Ubah ini sesuai dengan alur navigasi Anda
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/login');
    }
}
