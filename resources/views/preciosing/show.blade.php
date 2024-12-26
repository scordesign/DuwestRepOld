@extends('layouts.app')

@section('template_title')
    {{ $preciosIng->name ?? 'Show Precios Ing' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Precios Ing</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('precios-ings.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Usu:</strong>
                            {{ $preciosIng->id_usu }}
                        </div>
                        <div class="form-group">
                            <strong>Id Ing Act:</strong>
                            {{ $preciosIng->id_ing_act }}
                        </div>
                        <div class="form-group">
                            <strong>Marca Comercial:</strong>
                            {{ $preciosIng->marca_comercial }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $preciosIng->Precio }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
