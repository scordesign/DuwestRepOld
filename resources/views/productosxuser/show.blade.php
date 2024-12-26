@extends('layouts.app')

@section('template_title')
    {{ $productosxuser->name ?? 'Show Productosxuser' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Productos x usuario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('productosxusers.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Usu:</strong>
                            {{ $productosxuser->id_usu }}
                        </div>
                        <div class="form-group">
                            <strong>Id Produc:</strong>
                            {{ $productosxuser->id_produc }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
