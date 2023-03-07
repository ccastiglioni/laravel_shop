<!DOCTYPE html>
<html lang="en">
    @include('layouts.includes_painel.head')
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
                <h5>Cadastro de Produto</h5>
                <hr>

                <form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data" >
                <div class="row">
                    <div class="col-md-6">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome </label>
                                <input type="text" name="nome" value="{{  old('nome')  }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome do Produto">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Categoria</label>
                            <select name="categoria_id" class="form-control" id="exampleFormControlSelect1">
                               @foreach ($arr_categorias as $cat )
                               <option value="{{ $cat->id_catg }}">{{ $cat->nome }} </option>
                               @endforeach

                            </select>
                        </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Imagem </label>
                                <input type="file" name="imagem[]" class="form-control" id="inputPassword3"  multiple="multiple" />
                            </div>

                    </div>
                    <div class="col-md-6">
                            <div class="form-group">
                                <label>Valor</label>
                                <input type="text" name="valor" value="{{  old('valor')  }}"  class="form-control" placeholder="Preço do produto">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Destaque</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option value="S">Sim</option>
                                    <option value="N">Não</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tamanho</label>
                                <input type="text" name="tamanho" value="{{ old('tamanho') }}" class="form-control" placeholder="Tamanho do produto">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" name="ativo" class="form-check-input" value="0">
                                <label class="form-check-label" for="exampleCheck1">Ativo</label>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Descrição</label>
                                <textarea name="descricao" class="form-control"  cols="5"  rows="3">{{ old("descricao") }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>

                    @if($errors->any())
                    <div class="alert alert-danger">

                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                    </div>
                @endif
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
