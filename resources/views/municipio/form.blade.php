<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('desc') }}
            {{ Form::text('desc', $municipio->desc, ['class' => 'form-control' . ($errors->has('desc') ? ' is-invalid' : ''), 'placeholder' => 'Desc']) }}
            {!! $errors->first('desc', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_usu') }}
            {{ Form::text('id_usu', $municipio->id_usu, ['class' => 'form-control' . ($errors->has('id_usu') ? ' is-invalid' : ''), 'placeholder' => 'Id Usu']) }}
            {!! $errors->first('id_usu', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>