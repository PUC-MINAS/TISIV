<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Filial;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();

        return view('users.index')->with('users', $users);
    }

    public function create(){
        $filiais = Filial::all();

        return view('users.create')->with('filiais', $filiais);
    }

    public function store(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        
        $userExist = $this->getUserExist($name, $email);
        if( $userExist == null ) {
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->tipo = $request->input('tipo');
            $user->id_filiais = $request->input('filial');
            $user->password = Hash::make($request->input('password'));

            $user->save();

            return redirect('users')->with('success', 'Usuário cadastrado com sucesso!');
        }
        else {
            $msg = "Não foi possível realizar o cadastrar, pois já existe outro usuário com os mesmos dados";
            return redirect()->back()->with('error', $msg);
        }

    }

    private function getUserExist($name, $email) {
        return User::where('name', $name)->orWhere('email', $email)->first();
    }
}
