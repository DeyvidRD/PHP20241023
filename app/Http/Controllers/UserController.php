<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function criar(Request $request) {
        $user = new User;
        $user->name = $request->name;
        $user->cpf = $request->cpf;
        $user->email = $request->email;

        $user->save();
        return redirect('/listar_usuarios');
    }

    public function listar() {
        $users = User::all();

        return view("users", ["users"=>$users]);
    }

    public function formCriarUsuario() {
        return view("cadastro_usuario");
    }

    public function deletar($id) {
        $user = new User;
        $user->find($id)->delete();
        return redirect('/listar_produtos');
    }

    public function formEditarUsuario($id) {
        $user = User::find($id);

        return view('editar_usuario', ["user" => $user]);
    }


    public function editar(Request $request) {
        User::where('id', $request->id)->update([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'email' => $request->email
        ]);

        return redirect('/listar_usuarios');
    }

}

