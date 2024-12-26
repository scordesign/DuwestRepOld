@extends('layouts.app')

@section('template_title')
    Reportes
@endsection

@section('content')
@if (Auth::user()->rol=='admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Reportes') }}
                            </span>

                             <div class="card-header">
                               Reportes Duwest Colombia
                              </div>
                        </div>
                    </div>
                    </br></br>
                     <a href="https://duclient.duwestcolombia.com/public/usersexport"class="btn btn-primary">Informe usuarios</a></br></br>
                     <a href="https://duclient.duwestcolombia.com/public/ventasexport"class="btn btn-primary">Informe Venta/Cultivo</a></br></br>
                      <a href="https://duclient.duwestcolombia.com/public/tietoexport"class="btn btn-primary">Informe Tieto</a></br></br>
                      <a href="https://duclient.duwestcolombia.com/public/ingredientesexport"class="btn btn-primary">Informe Ingredientes Activos x Precio</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @else
    <div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">{{ __('no autorizado') }}</div>
        <center>
        <br><h3>Usuario no autorizado pongase en contacto con el administrador para obtener la autorizacion a este modulo </h3>
        <br><a href="{{ url('/') }}"><button style="width:100%;" type="button" class="btn btn-secondary">Inicio</button></a><br>
        </center>
        </div>
        </div>   
    </div>
        </div>
    </div>
    @endif
@endsection
