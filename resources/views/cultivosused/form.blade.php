<div class="box box-info padding-1">
    <div class="box-body">
    <input type="hidden" name="idventa" value="{{$idventas}}">
        <div class="form-group">
            {{ Form::hidden('id_cult_use', $cultivosused->id_cult_use, ['class' => 'form-control' . ($errors->has('id_cult_use') ? ' is-invalid' : ''), 'placeholder' => 'Id Cult Use']) }}
            {!! $errors->first('id_cult_use', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::hidden('desc_cult_use', $cultivosused->desc_cult_use, ['class' => 'form-control' . ($errors->has('desc_cult_use') ? ' is-invalid' : ''), 'placeholder' => 'Desc Cult Use']) }}
            {!! $errors->first('desc_cult_use', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        
        <div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text">Participación</span>
    </div>
    <input  type="number" value="{{ $cultivosused->participacion}}" step="0.01" name="participacion" class="form-control" aria-label="Amount (to the nearest dollar)">
    <div class="input-group-append">
        <span class="input-group-text">%</span>
    </div>
    </div>
            
        </div>
        <div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm">Dosis por hectarea en litros</span>
    </div>
    <input type="number" step="0.01" value="{{ $cultivosused->litros}}" name="litros" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
    </div>
    <div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm">Número de aplicaciones al año</span>
    </div>
    <input   type="text" value="{{ $cultivosused->aplicaciones}}" name="aplicaciones" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
    </div>
        <div class="form-group">
            {{ Form::hidden('cultivos_cult_use', $cultivosused->cultivos_cult_use, ['class' => 'form-control' . ($errors->has('cultivos_cult_use') ? ' is-invalid' : ''), 'placeholder' => 'Cultivos Cult Use']) }}
            {!! $errors->first('cultivos_cult_use', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::hidden('cultivo_venta_id', $cultivosused->cultivo_venta_id, ['class' => 'form-control' . ($errors->has('cultivo_venta_id') ? ' is-invalid' : ''), 'placeholder' => 'Cultivo Venta Id']) }}
            {!! $errors->first('cultivo_venta_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::hidden('cultivo_prod_id', $cultivosused->cultivo_prod_id, ['class' => 'form-control' . ($errors->has('cultivo_prod_id') ? ' is-invalid' : ''), 'placeholder' => 'Cultivo Prod Id']) }}
            {!! $errors->first('cultivo_prod_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>