@extends('layouts.app')

@section('content')
<div class="site-wrap">

    @extends('layouts.header')

    <home-componente :categorias="{{ json_encode($categorias) }}" > </home-componente>

@endsection
