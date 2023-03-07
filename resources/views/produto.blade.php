@extends('layouts.app')

@section('content')
<div class="site-wrap">

    @extends('layouts.header')

    <produto-componente :produtos="{{ json_encode($produtos) }}"> </produto-componente>

@endsection
