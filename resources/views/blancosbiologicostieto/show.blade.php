@extends('layouts.app')

@section('template_title')
    {{ $blancosbiologicostieto->name ?? 'Show Blancosbiologicostieto' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Blancosbiologicostieto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('blancosbiologicostietos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Bb Ti:</strong>
                            {{ $blancosbiologicostieto->id_bb_ti }}
                        </div>
                        <div class="form-group">
                            <strong>Incidencia:</strong>
                            {{ $blancosbiologicostieto->incidencia }}
                        </div>
                        <div class="form-group">
                            <strong>Temp Aplica:</strong>
                            {{ $blancosbiologicostieto->temp_aplica }}
                        </div>
                        <div class="form-group">
                            <strong>Num Apli:</strong>
                            {{ $blancosbiologicostieto->num_apli }}
                        </div>
                        <div class="form-group">
                            <strong>Cultivo Bb Ti Id:</strong>
                            {{ $blancosbiologicostieto->cultivo_bb_ti_id }}
                        </div>
                        <div class="form-group">
                            <strong>Bbmother Bb Ti Id:</strong>
                            {{ $blancosbiologicostieto->bbmother_bb_ti_id }}
                        </div>
                        <div class="form-group">
                            <strong>Tieto Bb Ti Id:</strong>
                            {{ $blancosbiologicostieto->tieto_bb_ti_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
