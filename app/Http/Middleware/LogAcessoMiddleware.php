<?php

namespace App\Http\Middleware;

use App\Models\LogAcesso;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$lista='')
    {
        $header = $request->header();
        $server = $request->server();
       // dd($server['REMOTE_ADDR']);
         $rota   = $server['PATH_INFO'];
         $produto_id   = str_replace('/produto-detalhe/','',$rota);
         $user   = Auth::user();

         if (  !empty($user )  ){
            $dataAttr = $user->getAttributes();
            $uid      = $dataAttr['id'];
         }else{
            $uid = 0;
         }

         if ($this->checkUser( $uid,$produto_id ) == 0) {
             $acessos  =[
                'user_id'    => $uid,
                'produto_id' => $produto_id,
                'create'     => date('Y-m-d H:i:s'),
                'qtd_acessos'=> '1',
                'ip'=> $server['REMOTE_ADDR'],
                'descricao'  => 'Rota: '.$rota  .', S.O: '. $server['HTTP_SEC_CH_UA_PLATFORM']
            ];
            LogAcesso::create( $acessos);
         }else{
            //Acessos::where('user_id',$uid)->where('rotas','=',$rota )->increment('qtd_acessos'); // isso tambem Funciona!
            LogAcesso::where('user_id',$uid)->where('produto_id',$produto_id)->update(['qtd_acessos' => DB::raw('qtd_acessos + 1')]);
         }

        return $next($request); // next envia pra a proxima funcao/engine do FW
    }

    public function checkUser($uid,$produto_id ){

         $Acc = LogAcesso::where('user_id',$uid)->where('produto_id',$produto_id)->get();
         $num = $Acc->count();
         return $num;
    }
}
