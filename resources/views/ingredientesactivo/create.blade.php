@extends('layouts.app')

@section('template_title')
    Create Ingredientesactivo
@endsection

@section('content')
@if (Auth::user()->rol=='admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Ingredientesactivo</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('ingredientesactivos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('ingredientesactivo.form')

                        </form>
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
