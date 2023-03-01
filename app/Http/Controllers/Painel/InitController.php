<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class InitController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return 'INT ADMIN';
        return view('painel.init');
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'INT create';
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'INT show';
    }


    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function autenticar(Request $request)
    {
        //regras de validação
        $regras = [
            'email' => 'email',
            'password' => 'required'
        ];

        //as mensagens de feedback de validação
        $feedback = [
            'email.email' => 'O campo usuário (e-mail) é obrigatório',
            'password.required' => 'O campo password é obrigatório'
        ];

        //se não passar no validate
        $request->validate($regras, $feedback);

        //recuperamos os parâmetros do formulário
        $email    = $request->get('email');
        $password = bcrypt($request->get('password'));

        echo "Usuário: $email | password: $password";
        echo "<br>";

        $credenciais = $request->all(["email","password"]);

        $bollenVerifica = auth()->attempt($credenciais);

        //iniciar o Model User
        /*
            $user = new User();
            $usuario = $user->where('email', $email)->where('password', $password)->get()->first();
        */
        if(isset($bollenVerifica)) {

            session_start();
            $_SESSION['nome']  = $email;
            $_SESSION['email'] = $email;

            return redirect('painel');
        } else {
            return redirect()->route('painel.login', ['erro' => 1]);
        }
    }
     /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return  view('painel.login');
    }
    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'INT edit';
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
