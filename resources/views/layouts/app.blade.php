

<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

     <link rel="icon" href="https://duclient.duwestcolombia.com/public/img/Icono.jpg">

    <!-- CSRF Token -->

    <meta name="csrf-token" content="{{ csrf_token() }}">



    <title>{{ config('app.name', 'Duwest') }}</title>



    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>



    <!-- Fonts -->

    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">



    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    

</head>

<body>

    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">

            <div class="container">

                <a class="navbar-brand" href="{{ url('/') }}">

                <img src="https://duclient.duwestcolombia.com/public/img/logo duwest col 2021.png"style="height:8.5vh;">

                    

                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">

                    <span class="navbar-toggler-icon"></span>

                </button>



                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left Side Of Navbar -->

                    

                    @if (Auth::check())
                    @if (Auth::user()->estatus==1)
                    @if (Auth::user()->rol=='admin')

                    <ul class="navbar-nav me-auto">



                                <!-- <li class="nav-item">

                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>

                                </li> -->


                    <li class="nav-item">

                                    <a class="nav-link" href="{{ route('reportes.index') }}">

                                    <img src="https://duclient.duwestcolombia.com/public/img/informe-de-negocio.png"style="height:5vh;
                                    @media (max-width: 480px) { height:10vh; } ">    </br>  

{{ __('Informes') }}</a>

                                </li> 


                    <li class="nav-item">

                                    <a class="nav-link" href="{{ route('productos.index') }}">

                                    <img src="https://duclient.duwestcolombia.com/public/img/caja.png"style="height:5vh;
                                    @media (max-width: 480px) { height:10vh; } "> </br>   

                                    {{ __('Productos') }}</a>



                                </li>



                                 <li class="nav-item">

                                    <a class="nav-link" href="{{ route('users.index') }}">

                                    <img src="https://duclient.duwestcolombia.com/public/img/usuario.png"style="height:5vh;
                                    @media (max-width: 480px) { height:10vh; } ">    </br>  

{{ __('Usuarios') }}</a>

                                </li> 

                                

                                <li class="nav-item">

                                    <a class="nav-link" href="{{ route('municipios.index') }}">

                                    <img src="https://duclient.duwestcolombia.com/public/img/municipio.png"style="height:5vh;
                                    @media (max-width: 480px) { height:10vh; } "> </br>     

                                    {{ __('Municipios') }}</a>

                                </li>

                                <li class="nav-item">

                                    <a class="nav-link" href="{{ route('cultivos.index') }}">

                                    <img src="https://duclient.duwestcolombia.com/public/img/cultivar.png"style="height:5vh;
                                    @media (max-width: 480px) { height:10vh; } "> </br>         

                                    {{ __('Cultivos') }}</a>

                                </li>

                                <li class="nav-item">

                                    <a class="nav-link" href="{{ route('blancosbiologicos.index') }}">

                                    <img src="https://duclient.duwestcolombia.com/public/img/informe-de-crecimiento.png"style="height:5vh;
                                    @media (max-width: 480px) { height:10vh; } "> </br>     

                                    {{ __('Blancos Biologicos') }}</a>

                                </li>

                                <li class="nav-item">

                                    <a class="nav-link" href="{{ route('ingredientesactivos.index') }}">

                                    <img src="https://duclient.duwestcolombia.com/public/img/ingrediente.png"style="height:5vh;
                                    @media (max-width: 480px) { height:10vh; } ">  </br>    

                                    {{ __('Ingredientes activos ') }}</a>

                                </li>

                                <li class="nav-item">

                                    <a class="nav-link" href="{{ route('tietos.index') }}">

                                    <img src="https://duclient.duwestcolombia.com/public/img/adornar.png"style="height:5vh;
                                    @media (max-width: 480px) { height:10vh; } ">  </br>    

                                    {{ __('Tieto ') }}</a>

                                </li>

                                

                                <li class="nav-item">

                                    <a class="nav-link" href="{{ route('ventas.index') }}">

                                    <img src="https://duclient.duwestcolombia.com/public/img/ventas.png"style="height:5vh;
                                    @media (max-width: 480px) { height:10vh; } "> </br>     

                                    {{ __('Ventas x Cultivo') }}</a>

                                </li>
                                <li class="nav-item">

                                  <a class="nav-link" href="{{ route('precios_ings.index') }}">

                                    <img src="https://duclient.duwestcolombia.com/public/img/etiqueta.png"style="height:5vh;
                                    @media (max-width: 480px) { height:10vh; } "> </br>    

                                    {{ __('Precios ingredientes') }}</a>

                                </li>

                    </ul>

                    @else 

                    <ul class="navbar-nav me-auto">
<li class="nav-item">

                                  <a class="nav-link" href="">

                                    <img src="https://duclient.duwestcolombia.com/public/img/manual.png"style="height:5vh;"> </br>    

                                    {{ __('Instructivo') }}</a>

                                </li>
                    <li class="nav-item">

                                  

                                    <a class="nav-link" href="{{ route('ventas.index') }}">

                                    <img src="https://duclient.duwestcolombia.com/public/img/ventas.png"style="height:5vh;"> </br>    

                                    {{ __('Ventas x Cultivo') }}</a>

                                </li>

                                <li class="nav-item">

                                  <a class="nav-link" href="{{ route('precios_ings.index') }}">

                                    <img src="https://duclient.duwestcolombia.com/public/img/etiqueta.png"style="height:5vh;"> </br>    

                                    {{ __('Precios ingredientes') }}</a>

                                </li>

                                <li class="nav-item">

                                    <a class="nav-link" href="{{ route('tietos.index') }}">

                                    <img src="https://duclient.duwestcolombia.com/public/img/adornar.png"style="height:5vh;"> </br>    

                                    {{ __('Tieto ') }}</a>

                                </li>

                                

                    </ul>

 

                    @endif

                   
                    @endif
                    @endif



                    <!-- Right Side Of Navbar -->

                    <ul class="navbar-nav ms-auto">

                        <!-- Authentication Links -->

                        @guest

                            @if (Route::has('login'))

                                <li class="nav-item">

                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>

                                    <!-- <img src="https://duclient.duwestcolombia.com/public/img/adornar.png"style="width:50%;"> </br>     -->



                                </li>

                            @endif



                            

                        @else
                        @if (Auth::user()->estatus==1)
                            <li class="nav-item dropdown">
                            <center>
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                   <img src="https://duclient.duwestcolombia.com/public/img/user (1).png"style="height:7vh;"> </br>    
                                   {{ Auth::user()->name }}


                                    <!-- {{ Auth::user()->id }}

                                    {{ Auth::user()->rol }} -->
                                    
                                   

                                   

                                </a>



                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('logout') }}"

                                       onclick="event.preventDefault();

                                                     document.getElementById('logout-form').submit();">

                                        {{ __('Salir') }}

                                    </a>
                                    <a class="dropdown-item" href="{{ route('users.edit',Auth::user()->id) }}">
                                        {{ __('Editar') }}

                                    </a>
                                    


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                                        @csrf

                                    </form>

                                </div> 
                                </center>
                            </li>
                            @else 
                    <H3> Usuario deshabilitado  </H3>
                        @endif
                        @endguest

                    </ul>

                </div>

            </div>

        </nav>



        <main class="py-4">

            @yield('content')

        </main>

       

    </div>

    

</body>

</html>

