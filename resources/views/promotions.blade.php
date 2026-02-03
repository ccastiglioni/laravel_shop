@extends('layouts.app')

@section('content')
<div class="site-wrap">

    @extends('layouts.header')

    <div class="site-section">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-8">
                    <h1 class="mb-3">Promoções</h1>
                    <p class="text-muted">Ofertas simples para destacar o que está em destaque.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="p-4 border rounded bg-white">
                        <h4>Frete Grátis</h4>
                        <p>Em compras acima de R$ 199,00.</p>
                        <a href="{{ route('shop') }}" class="btn btn-primary btn-sm">Comprar Agora</a>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="p-4 border rounded bg-white">
                        <h4>10% OFF</h4>
                        <p>Use o cupom <strong>PRIMEIRA10</strong> no checkout.</p>
                        <a href="{{ route('cart') }}" class="btn btn-outline-primary btn-sm">Ir para o Carrinho</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
