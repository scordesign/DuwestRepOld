@extends('layouts.app')

@section('template_title')
    {{ $ingredientesactivosused->name ?? 'Show Ingredientesactivosused' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Ingredientesactivosused</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ingredientesactivosuseds.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Ing Act Use:</strong>
                            {{ $ingredientesactivosused->id_ing_act_use }}
                        </div>
                        <div class="form-group">
                            <strong>Porcentaje:</strong>
                            {{ $ingredientesactivosused->porcentaje }}
                        </div>
                        <div class="form-group">
                            <strong>Desc Ing Act Use:</strong>
                            {{ $ingredientesactivosused->desc_ing_act_use }}
                        </div>
                        <div class="form-group">
                            <strong>Dosis:</strong>
                            {{ $ingredientesactivosused->dosis }}
                        </div>
                        <div class="form-group">
                            <strong>Tieto Ing Act Use:</strong>
                            {{ $ingredientesactivosused->tieto_ing_act_use }}
                        </div>
                        <div class="form-group">
                            <strong>Ingmother Ing Act Id:</strong>
                            {{ $ingredientesactivosused->ingmother_ing_act_id }}
                        </div>
                        <div class="form-group">
                            <strong>Cult Ing Act Id:</strong>
                            {{ $ingredientesactivosused->cult_ing_act_id }}
                        </div>
                        <div class="form-group">
                            <strong>Bb Ing Act Id:</strong>
                            {{ $ingredientesactivosused->bb_ing_act_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
