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

    public function index()
    {
        $produto  = new Produto();
        $produtos = $produto->get();
        //dd($produtos);
        return view('produto', ['produtos'=>$produtos,'categorias' =>$this->arr_categorias] );
    }

    public function produtodetalhe($id)
    {
        $produto  = new Produto();
        $produto = $produto->find($id);

        return view('produto-detalhe', ['produto'=>$produto,'categorias' =>$this->arr_categorias] );
    }




}
