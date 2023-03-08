<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    var $arr_categorias = array();

    public function __construct()
    {
       $categorias = new Categoria();
       $this->arr_categorias =$categorias->get();
    }

    public function index($categ_slug='')
    {

        if( $categ_slug !='' ){

            $id_categ = Categoria::where('nome',strtolower($categ_slug))->get(['id_catg'])->toArray();

           /* OU pegar assim:
             $categ_prod = new Categoria();
            $categ_prod = $categ_prod->where('nome', strtolower($categ_slug) )->get();

            - map para pegar o valor do id_catg
            $id_categ = $categ_prod->map(function ($categ_prod) {
                return $categ_prod->only(['id_catg']);
            })->toArray();
             */

            $produtos = Categoria::find( $id_categ[0]['id_catg'])->categoria_hasmany_produtos;

        }else{
            $produtos = Produto::all();
        }
        return view('produto', ['produtos'=>$produtos,'categorias' =>$this->arr_categorias] );
    }

    public function produtodetalhe($id)
    {
        $produto  = new Produto();
        $produto  = $produto->find($id);

        return view('produto-detalhe', ['produto'=>$produto,'categorias' =>$this->arr_categorias] );
    }

    public function produtolist(){
    }



}
