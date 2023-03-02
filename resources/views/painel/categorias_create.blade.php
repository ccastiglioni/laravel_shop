<!DOCTYPE html>
<html lang="en">
    @extends('layouts.includes_painel.head')
<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
      @include('layouts.includes_painel.menu_lateral')
    <!-- [ navigation menu ] end -->

    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
        <div class="pcoded-content">
        <div class="pcoded-inner-content">

        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                        <h5 class="m-b-10">Dashboard</h5>
                        </div>
                        <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/painel"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#!"> Categorias</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-body">
        <div class="page-wrapper">

        <div class="row">

        <div class="col-md-12">
            <div class="card-body">
                <h5>Cadastro de Categoria</h5>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        {{-- /painel/categorias  {{ route('categorias.store') }}  --}}
                        <form action="{{ route('categorias.store') }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome </label>
                                <input type="text" name="nome" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome da Categoria">
                                <small id="emailHelp" class="form-text text-muted">Esses Cadastros aparecerão no Produto</small>
                                <br>
                                <label for="exampleInputEmail1">Imagem </label>
                                {{-- <input type="file" name="imagem" class="form-control"> --}}
                                <input type="file" name="imagem" class="form-control" id="inputPassword3"  multiple="multiple" />

                            </div>
                            @if($errors->any())
                                <div class="alert alert-danger">

                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                                </div>
                            @endif
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>



                </div>
            </div>
        </div>

        </div>

        </div>
        </div>
        </div>
        </div>
        </div>
        </div>


    <!-- Required Js -->
    @extends('layouts.includes_painel.footer')
