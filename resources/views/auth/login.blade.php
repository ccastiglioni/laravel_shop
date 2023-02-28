@extends('layouts.app')

@section('content')
<div class="site-wrap">

    @extends('layouts.header')
    <login-componente csrf_token="{{ @csrf_token() }}" > </login-componente>

@endsection

