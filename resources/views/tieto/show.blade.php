@extends('layouts.app')

@section('template_title')
    {{ $tieto->name ?? 'Show Tieto' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Tieto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tietos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Desc:</strong>
                            {{ $tieto->desc }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $tieto->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Id Usu:</strong>
                            {{ $tieto->id_usu }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
