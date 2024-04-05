<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'name'      => 'required|string',
            'username'  => 'required|string|unique:users',
            'password'  => 'required|string|min:8',
            'role'      => 'required|string|in:admin,petugas',
        ]);

        // Hash password sebelum menyimpan ke database
        $hashedPassword = Hash::make($request->password);

        // Buat pengguna baru
        $user = User::create([
            'name'      => $request->name,
            'username'  => $request->username,
            'password'  => $hashedPassword,
            'role'      => $request->role,
        ]);

        // Redirect atau response sesuai kebutuhan
    }

    // Method untuk menampilkan halaman beranda pengguna
    public function home()
    {
        return view('admin.home');
    }

    public function user(){
        return view('user.home');
    }
}
