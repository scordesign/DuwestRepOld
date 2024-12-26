<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('blanco biologico') }}
            {{ Form::text('blancobiologico', $blancosbiologico->blancobiologico, ['class' => 'form-control' . ($errors->has('blancobiologico') ? ' is-invalid' : ''), 'placeholder' => 'Blancobiologico']) }}
            {!! $errors->first('blancobiologico', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>