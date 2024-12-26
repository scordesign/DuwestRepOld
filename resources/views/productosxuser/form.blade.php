<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_usu') }}
            {{ Form::text('id_usu', $productosxuser->id_usu, ['class' => 'form-control' . ($errors->has('id_usu') ? ' is-invalid' : ''), 'placeholder' => 'Id Usu']) }}
            {!! $errors->first('id_usu', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_produc') }}
            {{ Form::text('id_produc', $productosxuser->id_produc, ['class' => 'form-control' . ($errors->has('id_produc') ? ' is-invalid' : ''), 'placeholder' => 'Id Produc']) }}
            {!! $errors->first('id_produc', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>