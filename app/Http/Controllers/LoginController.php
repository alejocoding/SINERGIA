<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('log.index');
    }
    public function login(Request $request)
    {

        $credentials = $request->only('id', 'password');

        $user = User::where('id', $request->id)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session(['usuario' => $user]);
            return redirect('pacientes');
        }

        return redirect()->back()->withErrors(['error' => 'Usuario no encontrado o contraseña incorrecta']);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('usuario');
        return redirect('/')->with('success', 'Sesión cerrada correctamente');
    }
}
