<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('cultivo') }}
            {{ Form::text('cultivo', $cultivo->cultivo, ['class' => 'form-control' . ($errors->has('cultivo') ? ' is-invalid' : ''), 'placeholder' => 'Cultivo']) }}
            {!! $errors->first('cultivo', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>