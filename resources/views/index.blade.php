@extends('layouts.app')

@section('content')
<div class="site-wrap">

    @extends('layouts.header')
    {{-- Como mandar as variaveis de Linguagem para o VUE?  --}}
    <home-componente
        :categorias="{{ json_encode($categorias) }}"
        base-path="{{ request()->getBaseUrl() }}"
    > </home-componente>

@endsection
