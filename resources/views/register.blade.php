@extends('layouts.app')

@section('content')
<div class="site-wrap">

    @extends('layouts.header')

    <register-componente csrf_token='{{ @csrf_token() }}'> </register-componente>

@endsection
