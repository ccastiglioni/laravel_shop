<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   var $arr_categorias = array();

    public function __construct()
    {
       // $this->middleware('auth');
       $categorias = new Categoria();
       $this->arr_categorias =$categorias->get();
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $categorias['categorias'] =  $categoriasLara->toArray();
        // dd( $categorias );
        // $categorias = $categorias->toArray();
        /*
        dd( $categorias->getAttributes() );
        */
        return view('index', ['categorias'=> $this->arr_categorias]);
    }

    public function about()
    {
        return view('about',['categorias'=> $this->arr_categorias]);
    }

    public function contact()
    {
        return view('contact',['categorias'=> $this->arr_categorias]);
    }

    public function register()
    {
        return view('register',['categorias'=> $this->arr_categorias]);
    }

    public function shop()
    {
        return view('shop',['categorias'=> $this->arr_categorias]);
    }

    public function favorites()
    {
        return 'favorites';
    }

    public function cart()
    {
        return 'cart';
    }

    public function catalogue()
    {
        return 'catalogue';
    }

    public function promotions()
    {
        return 'promotions';
    }


}
