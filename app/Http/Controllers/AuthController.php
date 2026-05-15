<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index(){
        return view("modules/auth/login");
    }

    public function logear(Request $request) {
        $creadenciales = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($creadenciales)) {
            if (Auth::user()->role === 'administrador') {
                return to_route('admin.home');
            }
            return to_route('veterinario.home');
        } else {
            return to_route('login');
        }
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return to_route('login');
    }

    public function veterinario_home() {
        return view('modules/dashboard/home');
    }

    public function admin_home() {
        return view('modules/dashboard/admin_home');
    }
}
