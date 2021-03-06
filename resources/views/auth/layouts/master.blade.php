<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Админка: @yield('title')</title>

    <!-- Scripts -->
    <script src="/js/app.js" defer></script>
    <script
        src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
        crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">


    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/starter-template.css" rel="stylesheet">
    <link href="/css/menus.css" rel="stylesheet">

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/admin.css" rel="stylesheet">
    <link href="/css/menus.css" rel="stylesheet">
</head>
<body>
<div id="app">



        <nav class="navbar navbar-expand-lg navbar-light bg-light admin">
            <a class="navbar-brand" href="{{route('index')}}">Вернуться на сайт</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 admin">
                    @admin
                    <li><a class="admin" href="{{ route('categories.index') }}">Категории</a></li>
                    <li><a class="admin"href="{{ route('products.index') }}">Товары</a>  </li>
                    <li><a  class="admin"href="{{ route('home') }}">Заказы</a></li>
                    @else
                        @auth
                        <li><a class="admin"href="{{route('order.index.person')}}">Мои заказы</a></li>
                        @endauth
                    @endadmin
                            <li>

                                <div class="dropdown" >
                                    <button style=" background-color: #f8f9fa!important; border: 0px; outline: none; color:black; padding: 0px" class=" dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{App\Money::where('name',session('money','RUB'))->first()->symbol}}
                                    </button>
                                    <div style=" background-color: #f8f9fa!important; color:black!important;" class="dropdown-menu main-menu-lang" aria-labelledby="dropdownMenuButton">

                                        @foreach(App\Money::get() as $money)
                                            <a  style="color:black!important;"href="{{route('money',$money->name)}}"> {{$money->symbol}} </a>
                                            <br>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                </ul>

                @auth
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false" v-pre>
                                @admin
                                Администратор
                                @else

                                    {{Auth::User()->name}}


                                @endadmin

                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item admin" href="{{ route('logout')}}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Выйти
                                </a>

                                <form id="logout-form" action="{{ route('logout')}}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    </ul>


                @endauth
                @guest
                    <ul class="nav navbar-nav navbar-right" >
                        <li><a style="color: #1b1e21!important;" class="hover-effect" href="{{route('login')}}">@lang('main.sign_in')</a></li>
                        <li><a style="color: #1b1e21!important;" class="hover-effect" href="{{route('register')}}">@lang('main.sign_up')</a></li>
                    </ul>
                @endguest
            </div>

</nav>
    <div class="py-4">
        <div class="container">
            <div class="row justify-content-center">



                @yield('content')
            </div>
        </div>
    </div>
</div>
<script src="/js/scroll.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
<script src="/js/slider.js"></script>
</body>
</html>
