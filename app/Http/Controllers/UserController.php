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

    public function index(Request $request)
    {
        $user_search = $request->input('user_search');
        $filial_search = $request->input('filial_search');
        $tipo_search = $request->input('tipo_search');
        $filiais = Filial::all();
        $users = User::query();

        if(!empty($user_search)){
            $users = $users->where('name', 'LIKE' , "%{$user_search}%")
                                    ->orWhere('email', 'Like', "%{$user_search}%");
        }

        if(!empty($filial_search)){
            $users = $users->where('id_filiais', $filial_search);
        }

        if($tipo_search != null){
            $users = $users->where('tipo', $tipo_search);
        }

        $users = $users->get();

        return view('users.index')->with('users', $users)
                                  ->with('user_search', $user_search)
                                  ->with('filial_search', $filial_search)
                                  ->with('filiais', $filiais)
                                  ->with('tipo_search', $tipo_search);
    }

    public function create(){
        $filiais = Filial::all();

        return view('users.create')->with('filiais', $filiais);
    }

    public function store(Request $request){
        $email = $request->input('email');
        
        $userExist = User::where('email', $email)->first();
        if( $userExist == null ) {
            $user = new User();
            $user->name = $request->input('name');;
            $user->email = $email;
            $user->tipo = $request->input('tipo');
            $user->id_filiais = $request->input('filial');
            $user->password = Hash::make($request->input('password'));

            $user->save();

            return redirect('users')->with('success', 'Usuário cadastrado com sucesso!');
        }
        else {
            $msg = "Não foi possível realizar o cadastrar, pois já existe outro usuário com o mesmo email";
            return redirect()->back()->with('error', $msg);
        }

    }

    public function show($id){
        $user = User::find($id);

        return view('users.show')->with('user', $user);
    }

    public function edit($id){
        $user = User::find($id);
        $filiais = Filial::all();

        return view('users.edit')->with('user', $user)
                                 ->with('filiais', $filiais);
    }

    public function update(Request $request, $id){
        $error = false;
        $email = $request->input('email');
        $user = User::find($id);

        if($user->email != $email){
            $user = User::where('email', $email)->where('id', '<>', $id);
            $error = $user != null;
        }
        
        if( !$error ) {
            $user->name = $request->input('name');
            $user->email = $email;
            $user->tipo = $request->input('tipo');
            $user->id_filiais = $request->input('filial');

            $user->save();

            return redirect('users/'.$user->$id)->with('success', 'Usuário atualizado com sucesso!');
        }
        else {
            $msg = "Não foi possível atualizar o usuarío, pois já existe outro usuário com o mesmo email";
            return redirect()->back()->with('error', $msg);
        }
    }
}
