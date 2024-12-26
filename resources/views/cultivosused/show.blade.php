@extends('layouts.app')

@section('template_title')
    {{ $cultivosused->name ?? 'Show Cultivosused' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Cultivosused</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cultivosuseds.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Cult Use:</strong>
                            {{ $cultivosused->id_cult_use }}
                        </div>
                        <div class="form-group">
                            <strong>Desc Cult Use:</strong>
                            {{ $cultivosused->desc_cult_use }}
                        </div>
                        <div class="form-group">
                            <strong>Participacion:</strong>
                            {{ $cultivosused->participacion }}
                        </div>
                        <div class="form-group">
                            <strong>Litros:</strong>
                            {{ $cultivosused->litros }}
                        </div>
                        <div class="form-group">
                            <strong>Aplicaciones:</strong>
                            {{ $cultivosused->aplicaciones }}
                        </div>
                        <div class="form-group">
                            <strong>Cultivos Cult Use:</strong>
                            {{ $cultivosused->cultivos_cult_use }}
                        </div>
                        <div class="form-group">
                            <strong>Cultivo Venta Id:</strong>
                            {{ $cultivosused->cultivo_venta_id }}
                        </div>
                        <div class="form-group">
                            <strong>Cultivo Prod Id:</strong>
                            {{ $cultivosused->cultivo_prod_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
