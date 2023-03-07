@extends('layouts.app')

@section('content')
<div class="site-wrap">

    @extends('layouts.header')

    <produto-detalhe-componente :produto="{{ json_encode($produto) }}"> </produto-detalhe-componente>

@endsection
