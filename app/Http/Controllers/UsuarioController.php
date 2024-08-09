<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // POST
    public function store(Request $request)
    {
        $request->validate([
            'cpf' => 'required|unique:usuarios|digits:11',
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
        ]);

        $usuario = Usuario::create($request->all());

        return response()->json($usuario, 201);
    }

    //GET
    public function showByCpf($cpf)
    {
        // O nome do campo no banco de dados eh 'cpf'
        $usuario = Usuario::where('cpf', $cpf)->first();

        if ($usuario) {
            return response()->json($usuario);
        } else {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }
    }
}
