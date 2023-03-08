<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

    public function login(Request $request) {

        $credenciais = $request->all(['email', 'password']); //[]

        //autenticação (email e senha)
        $token = auth('web')->attempt($credenciais);

        if($token) { //usuário autenticado com sucesso
            return response()->json(['token' => $token]);

        } else { //erro de usuário ou senha
            return response()->json(['erro' => 'Usuário ou senha inválido!'], 403);

            //401 = Unauthorized -> não autorizado
            //403 = forbidden -> proibido (login inválido)
        }

    }

    public function logout(){

        return '<h3>logout</h3>';
    }
    public function refresh(){

        return '<h3>refresh</h3>';
    }
    public function me(){

        $authUser = (auth()->user());

          return response()->json($authUser);
    }

    public function kill()
    {

        $authUser = Auth::user();
       // $authUser = Auth::logout();
        Auth::logout();
      // Auth::guard($this->getGuard())->logout();



        // Retrieve the currently authenticated user's ID...
        $id = Auth::id();
        dd('kill session! ' . $authUser . 'ID: ' . $id);
    }
}
