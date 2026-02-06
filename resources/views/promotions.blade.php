@extends('layouts.app')

@section('content')
<div class="site-wrap">

    @extends('layouts.header')

    <div class="site-section">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-8">
                    <h1 class="mb-3">Promoções</h1>
                    <p class="text-muted">Produtos marcados como promoção.</p>
                </div>
            </div>

            @if(($produtosPromocao ?? collect())->isEmpty())
                <div class="p-4 border rounded bg-white">
                    <p class="mb-0">Nenhum produto em promoção no momento.</p>
                </div>
            @else
                <div class="row">
                    @foreach($produtosPromocao as $produto)
                        <div class="col-md-4 mb-4">
                            <div class="p-3 border rounded bg-white h-100">
                                @if(!empty($produto->imagem))
                                    <div class="mb-3">
                                        <img src="{{ asset($produto->imagem) }}" alt="{{ $produto->nome }}" class="img-fluid rounded">
                                    </div>
                                @endif
                                <div class="mb-2">
                                    <strong>{{ $produto->nome }}</strong>
                                </div>
                                <div class="text-muted mb-2">
                                    R$ {{ number_format($produto->valor, 2, ',', '.') }}
                                </div>
                                <a href="{{ url('produto-detalhe/'.$produto->id_prod) }}" class="btn btn-primary btn-sm">
                                    Ver Produto
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

@endsection
