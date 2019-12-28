<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Usuario as UsuarioModel;

class Usuario extends Controller
{
    public function cadastrar(){
        return view('usuario.cadastro');
    }

    public function salvar(Request $request){
        $request->validate([
            "nome" => "required",
            "email" => "required|email",
            "senha" => "required|min:5"
        ]);

        if (UsuarioModel::cadastrar($request)){
            return view(('usuario.sucesso'), [
                "fulano" => $request->input('nome')
            ]);
        }
        return view(('usuario.falha'));
    }
}
