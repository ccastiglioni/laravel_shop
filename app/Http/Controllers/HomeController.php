<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function about()
    {
        return 'about';
    }

    public function favorites()
    {
        return 'favorites';
    }

    public function cart()
    {
        return 'cart';
    }

    public function shop()
    {
        return 'shop';
    }

    public function catalogue()
    {
        return 'catalogue';
    }

    public function promotions()
    {
        return 'promotions';
    }

    public function contact()
    {
        return 'contact';
    }
}
