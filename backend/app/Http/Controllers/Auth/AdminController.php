<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    /** =============================
     *  Mostrar vista de login admin
     *  =============================
    */
    public function showLogin()
    {
        return view('admin.login');
    }

    /** =============================
     *  Login del administrador
     *  =============================
    */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Verifica email existe
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'El usuario no existe']);
        }

        // VERIFICACIÓN ESPECIAL → contraseña = cedula + "B"
        $cedulaMasB = $user->id . "B";

        if ($cedulaMasB !== $request->password) {
            return back()->withErrors(['password' => 'Contraseña inválida para administrador']);
        }

        // Login manual sin usar la contraseña hash
        Auth::login($user);

        return redirect('/admin/usuarios');
    }

    /** =============================
     *  Mostrar vista de registro admin
     *  =============================
    */
    public function showRegister()
    {
        return view('admin.register');
    }

    /** =============================
     *  Registrar administrador
     *  =============================
    */
    public function register(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|unique:users,email'
        ]);

        // Validar contraseña especial = cedula + "B"
        // El ID no se conoce aún, así que no se usa la regla aquí.
        // Se hará luego de crear.

        // Crear usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            // Se guarda un password temporal (hash)
            'password' => Hash::make("temporal")
        ]);

        // Ahora su contraseña REAL será su id + "B"
        $passwordCorrecta = $user->id . "B";

        $user->password = Hash::make($passwordCorrecta);
        $user->save();

        return redirect('/admin/login')
                ->with('success', "Administrador creado. Su contraseña es: {$passwordCorrecta}");
    }

    /** =============================
     * Logout
     *  =============================
    */
    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
}
