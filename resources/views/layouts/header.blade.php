<!doctype html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Styles  template site-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/aos.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <style>
.crop-prod {
    width: 252px;
    height: 308px;
}
.crop {
    width: 450px;
    height: 409px;
    overflow: hidden;
}
.crop img {
    width: 200px;
    height: 340px;
    margin: -75px 0 0 -100px;
}

    </style>
</head>
<body>
<header class="site-navbar" role="banner">
    <div class="site-navbar-top">
      <div class="container">
        <div class="row align-items-center">

          <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
            <form action="" class="site-block-top-search">
              <span class="icon icon-search2"></span>
              <input type="text" class="form-control border-0" placeholder="{{ __('messages.search') }}">
            </form>
          </div>

          <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
            <div class="site-logo">
              <a href="{{ route('about') }}" class="js-logo-clone">Shoppers</a>
            </div>
          </div>

          <div class="col-8 col-md-4 order-3 order-md-3 text-right">
            <div class="site-top-icons">
              <ul>

                <li>
                    @if(Auth::check())
                         <a href="{{ route('cart') }}"  data-toggle="Mytooltip" data-placement="top"  title="Agora Você está" >   <span class="icon icon-person"></span> </a>
                    @else
                         <a href="{{ route('login') }}"  data-toggle="Mytooltip" data-placement="top"  title="Você não está logando ainda!" >   <span class="icon icon-person"></span> </a>
                    @endif
                </li>
                <li><a href="{{ route('favorites') }}"><span class="icon icon-heart-o"></span></a></li>
                @auth
                <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
          @endauth

                <li>
                  <a href="{{ route('cart') }}" class="site-cart">
                    <span class="icon icon-shopping_cart"></span>
                    <span class="count">2</span>
                  </a>
                </li>


                <li class="d-inline-block d-md-none ml-md-0">
                    <a href="#" class="site-menu-toggle js-menu-toggle">  </a>
                </li>

              </ul>
            </div>
            <nav class="site-navigation text-right " role="navigation">
              <div class="container">
                <ul class="site-menu js-clone-nav d-none d-md-block">

                  <li class="has-children">
                    <a href="{{ route('about') }}">Linguagem</a>
                    <ul class="dropdown">
                      @include('layouts/language_switcher')
                    </ul>
                  </li>

                </ul>

              </div>
            </nav>
          </div>
         {{--  <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
              <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

                  <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                      {{ __('Welcome to our website') }}
                  </div>
              </div>
          </div> --}}
        </div>
      </div>
    </div>
    <nav class="site-navigation text-right text-md-center" role="navigation">
      <div class="container">
        <ul class="site-menu js-clone-nav d-none d-md-block">
          <li class="">
            <a href="{{ route('home') }}">Home</a>
        {{--     <ul class="dropdown">
              <li><a href="#">Menu One</a></li>
              <li><a href="#">Menu Two</a></li>
              <li><a href="#">Menu Three</a></li>
              <li class="has-children">
                <a href="#">Sub Menu</a>
                <ul class="dropdown">
                  <li><a href="#">Menu One</a></li>
                  <li><a href="#">Menu Two</a></li>
                  <li><a href="#">Menu Three</a></li>
                </ul>
              </li>
            </ul> --}}
          </li>
          <li class=" ">
            <a href="{{ route('about') }}">{{ __('messages.about') }}</a>
          </li>
          <li class="has-children"><a >Shop</a>
            <ul class="dropdown">
                @foreach ($categorias as $catg)
                    <li><a href="{{ url('produto/'.$catg->nome) }}">{{ ucfirst($catg->nome) }}</a></li>
                   {{--  <li><a href="{{ route('produto') }}">{{ ucfirst($catg->nome) }}</a></li> --}}
                @endforeach

            </ul>
        </li>

          <li><a href="{{ route('catalogue') }}">{{ __('messages.catalogue') }}</a></li>
          <li><a href="{{ route('promotions') }}">{{ __('messages.promo') }}</a></li>
          <li><a href="{{ route('contact') }}" data-toggle="Mytooltip"  title="Contato" >{{ __('messages.contact') }}</a></li>
        </ul>
      </div>
    </nav>
  </header>
