<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Models\Categoria;

class ForgotPasswordController extends Controller
{

    var $arr_categorias = array();

    public function __construct()
    {
       // $this->middleware('auth');
       $categorias = new Categoria();
       $this->arr_categorias =$categorias->get();
    }

    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
}
