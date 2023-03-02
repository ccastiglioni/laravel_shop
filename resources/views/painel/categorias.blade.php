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

    <!-- [ Header ] start -->

    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
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
            <div class="card user-list">
            <div class="card-header">
            <h5>Listagem de Categorias</h5>
            <div class="card-header-right">
                <div class="btn-group card-option">
                    <a href="{{ route('categorias.create') }}"><button type="button" class="btn btn-primary" title="" data-toggle="tooltip" data-original-title="Clique para cadastrar um Produto">Cadastrar</button></a>
                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-end">
                <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                </ul>
                </div>
            </div>
            </div>
            <div style='padding: 12px 14px;' class="card-block pb-0">
            <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Data</th>
                    <th>Ação</th>
                  </tr>
                </thead>
                <tbody>

                @foreach ($categorias as $categ)
                <tr>
                    <td>{{ $categ->id_catg }}</td>
                    <td>
                        @if ($categ->imagem)
                            @php
                                $img = asset($categ->imagem);
                            @endphp
                        @else
                            @php
                               $img = asset('imagens/no-img.png')
                            @endphp

                         @endif
                        <img class="rounded-circle" style="width:50px;" src="{{ $img }}" alt="activity-user">
                    </td>
                    <td>
                        <h6 class="mb-1">{{ $categ->nome }}</h6>
                    </td>
                    <td><h6 class="m-0">{{ $categ->created_at }}</h6></td>
                    <td>
                        <a href="#!" class="label theme-bg2 text-white f-12">Editar</a>
                        <a href="#!" class="label theme-bg text-white f-12">Excluir</a>
                    </td>
                </tr>
                @endforeach



                </tbody>
            </table>
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
    <!-- [ Main Content ] end -->

    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->

    <!-- Warning Section Ends -->

    <!-- Required Js -->
    @extends('layouts.includes_painel.footer')
