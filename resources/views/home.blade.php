@extends('layouts.app')



@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">{{ __('Dashboard - Duwest') }}</div>



                <div class="card-body">

                    @if (session('status'))

                        <div class="alert alert-success" role="alert">

                            {{ session('status') }}

                        </div>

                        



                        </div>

                    @endif



                 

                    <div class="row justify-content-center">
                     @if (Auth::user()->estatus==1)
                            <div class="ventas"> 

                                <h1 style = "text-align:center;">Ventas/Cultivo</h1>
                                </br>

                                <p style = "text-align:justify;">Aquí describiremos como fue el comportamiento de ventas en cuanto a los cultivos y las plagas, ayudándonos a entender como estamos trabajando y como mejorar.</p>

                                <a href="{{ route('ventas.index') }}"> <img src="img/vineyard-g1dfbc123a_1280.jpeg"></a>



                            </div>

                            <div class="tieto"> 

                                <h1 style = "text-align:center;">Tieto</h1>
                                </br>
                                <p style = "text-align:justify;">Aquí descubriremos el potencial comercial del sector agrícola en tu sector, para descubrir oportunidades donde juntos podemos crecer.</p>
                                </br>


                                <a href="{{ route('tietos.index') }}"> <img src="img/man-g3c3280a03_1280.jpeg"></a>

                            </div>
                            

                            </div>
                             
                             

                            

                            </div>
                    @else
                    <h2> Su usuario ha sido desactivado si cree que esto es un error contactese con el administrador ,click en el siguiente boton para salir</h2>
                    

                                    <a class="btn btn-danger" href="{{ route('logout') }}"

                                       onclick="event.preventDefault();

                                                     document.getElementById('logout-form').submit();">

                                        {{ __('Salir') }}

                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                                        @csrf

                                    </form>

                
                    @endif

                </div>

            </div>

        </div>

    </div>

</div>
<!-- Footer -->
<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">2022 Copyright:
    <a href="/"> ScorDesign.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

@endsection

