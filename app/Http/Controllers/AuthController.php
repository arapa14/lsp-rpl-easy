<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() { return view('auth.login'); }
    public function register() { return view('auth.register'); }

    public function postRegister(Request $request) {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user'
        ]);
        return redirect('/login');
    }

    public function postLogin(Request $request) {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/dashboard');
        }
        return back();
    }

    public function dashboard() {
        if (Auth::user()->role == 'admin') {
            // Jika admin, kirim data jadwal untuk di-CRUD
            $schedules = Schedule::all();
            return view('admin.dashboard', compact('schedules'));
        }
        
        // Jika user, kirim data jadwal untuk dipesan
        $schedules = Schedule::where('stock', '>', 0)->get();
        return view('user.dashboard', compact('schedules'));
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}