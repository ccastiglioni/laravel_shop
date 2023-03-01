<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Support\Facades\Auth; OU use Auth; ????????

class AutenticaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
              //$obj_usr = new Auth();
              $user    = Auth::user();

              if (  !empty($user )  ){
                  $dataAttr = $user->getAttributes();
                  $uid      = $dataAttr['id'];
                  $str      = "usuario logado id: {$uid}";
               }else{
                  $uid = 0;
                  $str      = "usuario Nao logado!";
               }

               //$response = $next($request);
               //$response->setStatusCode('201','novo status!');

              return $next($request);
    }
}
