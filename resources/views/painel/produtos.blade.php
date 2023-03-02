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
    <header class="navbar pcoded-header navbar-expand-lg navbar-light">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse1" href="javascript:"><span></span></a>
            <a href="index.html" class="b-brand">
                   <div class="b-bg">
                       <i class="feather icon-trending-up"></i>
                   </div>
                   <span class="b-title">Datta Able</span>
               </a>
        </div>
        <a class="mobile-menu" id="mobile-header" href="javascript:">
            <i class="feather icon-more-horizontal"></i>
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li><a href="javascript:" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a></li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="javascript:" data-toggle="dropdown">Dropdown</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="javascript:">Action</a></li>
                        <li><a class="dropdown-item" href="javascript:">Another action</a></li>
                        <li><a class="dropdown-item" href="javascript:">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <div class="main-search">
                        <div class="input-group">
                            <input type="text" id="m-search" class="form-control" placeholder="Search . . .">
                            <a href="javascript:" class="input-group-append search-close">
                                <i class="feather icon-x input-group-text"></i>
                            </a>
                            <span class="input-group-append search-btn btn btn-primary">
                                <i class="feather icon-search input-group-text"></i>
                            </span>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="javascript:" data-toggle="dropdown"><i class="icon feather icon-bell"></i></a>
                        <div class="dropdown-menu dropdown-menu-right notification">
                            <div class="noti-head">
                                <h6 class="d-inline-block m-b-0">Notifications</h6>
                                <div class="float-right">
                                    <a href="javascript:" class="m-r-10">mark as read</a>
                                    <a href="javascript:">clear all</a>
                                </div>
                            </div>
                            <ul class="noti-body">
                                <li class="n-title">
                                    <p class="m-b-0">NEW</p>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="{{ asset('admin/images/user/avatar-1.jpg') }}" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>John Doe</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                            <p>New ticket Added</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="n-title">
                                    <p class="m-b-0">EARLIER</p>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="{{ asset('admin/images/user/avatar-2.jpg') }}" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                            <p>Prchace New Theme and make payment</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="{{ asset('admin/images/user/avatar-3.jpg') }}" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Sara Soudein</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                            <p>currently login</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="noti-footer">
                                <a href="javascript:">show all</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown drp-user">
                        <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon feather icon-settings"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <img src="{{ asset('admin/images/user/avatar-1.jpg') }}" class="img-radius" alt="User-Profile-Image">
                                @auth
                                    <span>{{ Auth::user()->name }}</span>
                                @endauth

                                <a href="auth-signin.html" class="dud-logout" title="Logout">
                                    <i class="feather icon-log-out"></i>
                                </a>
                            </div>
                            <ul class="pro-body">
                                <li><a href="javascript:" class="dropdown-item"><i class="feather icon-settings"></i> Settings</a></li>
                                <li><a href="javascript:" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                                <li><a href="message.html" class="dropdown-item"><i class="feather icon-mail"></i> My Messages</a></li>
                                <li><a href="auth-signin.html" class="dropdown-item"><i class="feather icon-lock"></i> Lock Screen</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </header>
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
        <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
        <li class="breadcrumb-item"><a href="#!"> Produtos</a></li>
        </ul>
        </div>
        </div>
        </div>
        </div>

        <div class="main-body">
        <div class="page-wrapper">

        <div class="row">

        <div class="col-md-6 col-xl-4">
        <div class="card project-task">
        <div class="card-block" style='padding: 12px 14px;' >
        <div class="row align-items-center justify-content-center">
        <div class="col">
        <h5 class="m-0"><i class="far fa-edit m-r-10"></i>Project Task</h5>
        </div>
        <div class="col-auto">
        <label class="label theme-bg text-white f-14 f-w-400 float-end">23% Done</label>
        </div>
        </div>
        <h6 class="text-muted mt-4 mb-3">Complete Task : 6/10</h6>
        <div class="progress">
        <div class="progress-bar progress-c-theme" role="progressbar" style="width:60%;height:6px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h6 class="mt-3 mb-0 text-center text-muted">Project Team : 28 Persons</h6>
        </div>
        </div>
        </div>
        <div class="col-md-6 col-xl-4">
        <div class="card">
        <div style='padding: 12px 14px;'  class="card-block">
        <h5 class="mb-4">Sales Statistics</h5>
        <h3 class="mb-4">2,30,598</h3>
        <span class="text-muted d-block">Top selling items statistic by last month</span>
        </div>
        </div>
        </div>
        <div class="col-md-12 col-xl-4">
        <div class="card card-event">
        <div style='padding: 12px 14px;' class="card-block">
        <div class="row align-items-center justify-content-center">
        <div class="col">
        <h5 class="m-0">Upcoming Event</h5>
        </div>
        <div class="col-auto">
        <label class="label theme-bg2 text-white f-14 f-w-400 float-end">34%</label>
        </div>
        </div>
        <h2 class="mt-2 ">45<sub class="text-muted f-14">Competitors</sub></h2>
        <h6 class="text-muted mt-3 mb-0">You can participate in event </h6>
        <i class="fab fa-angellist text-c-purple f-50"></i>
        </div>
        </div>
        </div>



        <div class="col-md-12">
            <div class="card user-list">
            <div class="card-header">
            <h5>Listagem de Produtos</h5>
            <div class="card-header-right">
                <div class="btn-group card-option">
                    <button type="button" class="btn btn-primary" title="" data-toggle="tooltip" data-original-title="Clique para cadastrar um Produto">Cadastrar</button>
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
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Views</th>
                    <th>Status</th>
                    <th>Data</th>
                    <th>Ação</th>
                  </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <img class="rounded-circle" style="width:50px;" src="{{ asset('imagens/shoe_1.jpg') }}" alt="activity-user">
                    </td>
                    <td>
                        <h6 class="mb-1">Social Media App</h6>
                        <p class="m-0">Assigned to<span class="text-c-green"> Tristan Madsen</span></p>
                    </td>
                    <td><span class="pie_1">326,134</span></td>
                    <td>
                        <h6 class="m-0">68%</h6>
                    </td>
                    <td><h6 class="m-0">October 26, 2017</h6></td>
                    <td>
                        <a href="#!" class="label theme-bg2 text-white f-12">Editar</a>
                        <a href="#!" class="label theme-bg text-white f-12">Excluir</a>
                    </td>
                </tr>

                <tr>
                <td><img class="rounded-circle" style="width:50px;" src="{{ asset('imagens/shoe_1.jpg') }}" alt="activity-user"></td>
                <td>
                <h6 class="mb-1">Newspaper Wordpress Web</h6>
                <p class="m-0">Assigned to<span class="text-c-green"> Marcus Poulsen</span></p>
                </td>
                <td><span class="pie_2">110,134</span></td>
                <td>
                <h6 class="m-0">46%</h6></td>
                <td><h6 class="m-0">September 4, 2017</h6></td>
                <td><a href="#!" class="label theme-bg2 text-white f-12">Editar</a><a href="#!" class="label theme-bg text-white f-12">Excluir</a></td>
                </tr>
                <tr>
                <td><img class="rounded-circle" style="width:50px;" src="{{ asset('imagens/shoe_1.jpg') }}" alt="activity-user"></td>
                <td>
                <h6 class="mb-1">Dashboard UI Kit Design</h6>
                <p class="m-0">Assigned to<span class="text-c-green"> Felix Johansen</span></p>
                </td>
                <td><span class="pie_3">226,134</span></td>
                <td>
                <h6 class="m-0">31%</h6></td>
                <td>
                <h6 class="m-0">November 14, 2017</h6></td>
                <td><a href="#!" class="label theme-bg2 text-white f-12">Editar</a><a href="#!" class="label theme-bg text-white f-12">Excluir</a></td>
                </tr>
                <tr>
                <td><img class="rounded-circle" style="width:50px;" src="{{ asset('imagens/shoe_1.jpg') }}" alt="activity-user"></td>
                <td>
                <h6 class="mb-1">Social Media App</h6>
                <p class="m-0">Assigned to<span class="text-c-green"> Tristan Madsen</span></p>
                </td>
                <td><span class="pie_4">500,134</span></td>
                <td>
                <h6 class="m-0">85%</h6></td>
                <td>
                <h6 class="m-0">December 14, 2017</h6></td>
                <td><a href="#!" class="label theme-bg2 text-white f-12">Editar</a><a href="#!" class="label theme-bg text-white f-12">Excluir</a></td>
                </tr>
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
