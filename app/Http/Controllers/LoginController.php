<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){

        return '<h3>login</h3>';
    }
    public function logout(){

        return '<h3>logout</h3>';
    }
    public function refresh(){

        return '<h3>refresh</h3>';
    }
    public function me(){

        return '<h3>me</h3>';
    }
}
