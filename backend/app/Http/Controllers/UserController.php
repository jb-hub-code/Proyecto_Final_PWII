<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // 📌 Mostrar lista de usuarios
    public function index()
    {
        return view('usuarios', [
            'users' => User::all()
        ]);
    }

    // 📌 Mostrar formulario de modificar usuario
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('edit', compact('user'));
    }

    // 📌 Guardar cambios del usuario (SIN verificación por SMS)
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validación básica
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|min:10',
            'password' => 'nullable|string|min:6',
        ]);

        // Guardar cambios directamente
        $user->name = $request->name;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->phone = $request->phone;
        $user->save();

        return redirect('usuarios')->with('success', 'Datos actualizados correctamente');
    }
}
