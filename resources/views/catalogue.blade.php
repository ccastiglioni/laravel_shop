@extends('layouts.app')

@section('content')
<div class="site-wrap">

    @extends('layouts.header')

    <div class="site-section">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-8">
                    <h1 class="mb-3">Catálogo</h1>
                    <p class="text-muted">Uma seleção simples de categorias e caminhos rápidos.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="p-4 border rounded bg-white">
                        <h4>Novidades</h4>
                        <p>Veja os produtos mais recentes da loja.</p>
                        <a href="{{ route('shop') }}" class="btn btn-primary btn-sm">Ir para Shop</a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="p-4 border rounded bg-white">
                        <h4>Categorias</h4>
                        <p>Navegue por categorias no menu “Shop”.</p>
                        <a href="{{ route('home') }}" class="btn btn-outline-primary btn-sm">Voltar ao Início</a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="p-4 border rounded bg-white">
                        <h4>Favoritos</h4>
                        <p>Acesse os itens que você salvou.</p>
                        <a href="{{ route('favorites') }}" class="btn btn-outline-primary btn-sm">Ver Favoritos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
