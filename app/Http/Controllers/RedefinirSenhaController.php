<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;

class RedefinirSenhaController extends Controller
{
    public function edit($id){
        $user = User::find($id);
        return view('redefinir-senha.edit')->with('user', $user);
    }

    public function update(Request $request, $id){
        $user = User::find($id);

        $senhaAtual = $request->input('senhaAtual');
        $senhaNova = Hash::make($request->input('senhaNova'));

        if(Hash::check($senhaAtual, $user->password)){
            $user->password = $senhaNova;
            $user->save();

            return redirect('home')->with('success', 'Senha redefinida com sucesso!');
        }
        else {
            $msg = "Senha atual está incorreta.";
            return redirect()->back()->with('error', $msg);
        }
    }
}
