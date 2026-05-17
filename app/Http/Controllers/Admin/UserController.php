<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::with('veterinario')->paginate(5);
        return view('modules.dashboard.admin_usuarios', compact('usuarios'));
    }

    public function create()
    {
        return view('modules.dashboard.admin_usuarios_create');
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
            'role' => $request->role,
        ]);

        if ($request->role === 'veterinario') {
            $fotoPath = null;
            if ($request->hasFile('foto_firma')) {
                $fotoPath = $request->file('foto_firma')->store('firmas', 'public');
            }

            $user->veterinario()->create([
                'nombre_completo' => $request->nombre_completo,
                'especialidad' => $request->especialidad,
                'cedula_profesional' => $request->cedula_profesional,
                'foto_firma' => $fotoPath,
            ]);
        }

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario registrado correctamente.');
    }

    public function edit($id)
    {
        $usuario = User::with('veterinario')->findOrFail($id);
        return view('modules.dashboard.admin_usuarios_edit', compact('usuario'));
    }

    public function update(\App\Http\Requests\UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = \Illuminate\Support\Facades\Hash::make($request->password);
        }
        $user->role = $request->role;
        $user->save();

        if ($request->role === 'veterinario') {
            $fotoPath = $user->veterinario->foto_firma ?? null;
            
            if ($request->hasFile('foto_firma')) {
                // Delete old file if exists
                if ($fotoPath) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($fotoPath);
                }
                $fotoPath = $request->file('foto_firma')->store('firmas', 'public');
            }

            $user->veterinario()->updateOrCreate(
                ['usuario_id' => $user->id],
                [
                    'nombre_completo' => $request->nombre_completo,
                    'especialidad' => $request->especialidad,
                    'cedula_profesional' => $request->cedula_profesional,
                    'foto_firma' => $fotoPath,
                ]
            );
        } else {
            // Delete veterinario record and its image if changing role to something else
            if ($user->veterinario) {
                if ($user->veterinario->foto_firma) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($user->veterinario->foto_firma);
                }
                $user->veterinario()->delete();
            }
        }

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function show($id)
    {
        $usuario = User::with('veterinario')->findOrFail($id);
        return view('modules.dashboard.admin_usuarios_show', compact('usuario'));
    }

    public function destroy($id)
    {
        $usuario = User::with('veterinario')->findOrFail($id);

        try {
            // Save photo path to delete from storage if DB deletion is successful
            $fotoPath = null;
            if ($usuario->veterinario && $usuario->veterinario->foto_firma) {
                $fotoPath = $usuario->veterinario->foto_firma;
            }

            // Delete user. If there are FK dependencies (not cascaded), it throws QueryException
            $usuario->delete();

            // If we reach here, deletion was successful. Delete the physical file.
            if ($fotoPath) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($fotoPath);
            }

            return redirect()->route('admin.usuarios.index')->with('success', 'Usuario eliminado correctamente.');

        } catch (\Illuminate\Database\QueryException $e) {
            // 23000 is Integrity constraint violation
            if ($e->getCode() == "23000") {
                return redirect()->route('admin.usuarios.index')->with('error', 'No se puede eliminar este usuario porque contiene datos o registros vinculados.');
            }
            
            return redirect()->route('admin.usuarios.index')->with('error', 'Ocurrió un error en la base de datos al intentar eliminar el usuario.');
        }
    }
}
