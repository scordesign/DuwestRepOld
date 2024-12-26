@extends('layouts.app')

@section('template_title')
    {{ $blancosbiologico->name ?? 'Show Blancosbiologico' }}
@endsection

@section('content')@if (Auth::user()->rol=='admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Blancos biologicos</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('blancosbiologicos.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Blanco biologico:</strong>
                            {{ $blancosbiologico->blancobiologico }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
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
