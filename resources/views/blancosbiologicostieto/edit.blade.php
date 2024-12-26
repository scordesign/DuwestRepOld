@extends('layouts.app')

@section('template_title')
    Update Blancosbiologicostieto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Blancosbiologicostieto</span>
                    </div>
                    <div class="card-body">

                    
                    <form method="POST" action="{{ route('Blancosbiologicostietos.update', $Blancosbiologicostietos->id_bb_ti) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            <div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::hidden('id_bb_ti', $Blancosbiologicostietos->id_bb_ti, ['class' => 'form-control' . ($errors->has('id_bb_ti') ? ' is-invalid' : ''), 'placeholder' => 'Id Bb Ti']) }}
            {!! $errors->first('id_bb_ti', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Incidencia sobre el area cultivada') }}
            {{ Form::text('incidencia', $Blancosbiologicostietos->incidencia, ['class' => 'form-control' . ($errors->has('incidencia') ? ' is-invalid' : ''), 'placeholder' => 'Incidencia']) }}
            {!! $errors->first('incidencia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <script>
function replace() {
    var opciones = document.getElementById("opciones").value;
    var opcion0 = document.getElementById("opcion0");
    var opcion1 = document.getElementById("opcion1");
    if (Number(opciones) == 0) {
            opcion1.classList.add("vis");
        opcion0.classList.remove("vis");
    } else {

            opcion0.classList.add("vis");
        opcion1.classList.remove("vis");
    }
    
}
        </script><br>
<div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Temporadas de mayor aplicación</label>
                </div>
                <select onchange="replace()" name="temp_aplica" class="form-select"  id="opciones">
                    <option selected disabled>seleccione</option>
                    <option value="0">Climatico</option>
                    <option value="1">Mensual</option>
                </select>
            </div>

            <div class="vis input-group mb-3" id="opcion0">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Seleccione clima</label>
                </div>
                <select class="form-select" name="clima" >
                <option selected>Seleccione</option>
                    <option value="Lluvioso">Lluvioso</option>
                    <option value="Calido">Calido</option>
                </select>
            </div>

                
                

            <div class="vis input-group mb-3" id="opcion1">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Seleccione meses <br> 
                    (para seleccionar varios meses <br> presione control mas click)</span>
                </div>
                <select class="form-select" multiple name="meses[]" aria-label="multiple select example">
                <option selected >Seleccione</option>
                <option value="Enero">Enero</option>
                <option value="Febrero">Febrero</option>
                <option value="Marzo">Marzo</option>
                <option value="Abril">Abril</option>
                <option value="Mayo">Mayo</option>
                <option value="Junio">Junio</option>
                <option value="Julio">Julio</option>
                <option value="Agosto">Agosto</option>
                <option value="Septiembre">Septiembre</option>
                <option value="Octubre">Octubre</option>
                <option value="Noviembre">Noviembre</option>
                <option value="Diciembre">Diciembre</option>
                </select>        
            </div>
        <div class="form-group">
            {{ Form::label('Número de aplicaciones al año en promedio') }}
            {{ Form::text('num_apli', $Blancosbiologicostietos->num_apli, ['class' => 'form-control' . ($errors->has('num_apli') ? ' is-invalid' : ''), 'placeholder' => 'Num Apli']) }}
            {!! $errors->first('num_apli', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            
            {{ Form::hidden('cultivo_bb_ti_id', $Blancosbiologicostietos->cultivo_bb_ti_id, ['class' => 'form-control' . ($errors->has('cultivo_bb_ti_id') ? ' is-invalid' : ''), 'placeholder' => 'Cultivo Bb Ti Id']) }}
            {!! $errors->first('cultivo_bb_ti_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            
            {{ Form::hidden('bbmother_bb_ti_id', $Blancosbiologicostietos->bbmother_bb_ti_id, ['class' => 'form-control' . ($errors->has('bbmother_bb_ti_id') ? ' is-invalid' : ''), 'placeholder' => 'Bbmother Bb Ti Id']) }}
            {!! $errors->first('bbmother_bb_ti_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            
            {{ Form::hidden('tieto_bb_ti_id', $Blancosbiologicostietos->tieto_bb_ti_id, ['class' => 'form-control' . ($errors->has('tieto_bb_ti_id') ? ' is-invalid' : ''), 'placeholder' => 'Tieto Bb Ti Id']) }}
            {!! $errors->first('tieto_bb_ti_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <input type="hidden" name="idtieto" value="{{$idtieto}}">

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
                        </form>
                        <style>
        .vis{
            display: none;
        }
    </style>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
