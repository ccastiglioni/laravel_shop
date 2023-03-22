@extends('layouts.app')

@section('content')
<div class="site-wrap">

    @extends('layouts.header')

    <shop-cart :produtoscarrinho="{{ json_encode($produtoscarrinho) }}"> </shop-cart>

@endsection
