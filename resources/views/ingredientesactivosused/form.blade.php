<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            
            {{ Form::hidden('id_ing_act_use', $ingredientesactivosused->id_ing_act_use, ['class' => 'form-control' . ($errors->has('id_ing_act_use') ? ' is-invalid' : ''), 'placeholder' => 'Id Ing Act Use']) }}
            {!! $errors->first('id_ing_act_use', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('porcentaje') }}
            {{ Form::text('porcentaje', $ingredientesactivosused->porcentaje, ['class' => 'form-control' . ($errors->has('porcentaje') ? ' is-invalid' : ''), 'placeholder' => 'Porcentaje']) }}
            {!! $errors->first('porcentaje', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            
            {{ Form::hidden('desc_ing_act_use', $ingredientesactivosused->desc_ing_act_use, ['class' => 'form-control' . ($errors->has('desc_ing_act_use') ? ' is-invalid' : ''), 'placeholder' => 'Desc Ing Act Use']) }}
            {!! $errors->first('desc_ing_act_use', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dosis') }}
            {{ Form::text('dosis', $ingredientesactivosused->dosis, ['class' => 'form-control' . ($errors->has('dosis') ? ' is-invalid' : ''), 'placeholder' => 'Dosis']) }}
            {!! $errors->first('dosis', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            
            {{ Form::hidden('tieto_ing_act_use', $ingredientesactivosused->tieto_ing_act_use, ['class' => 'form-control' . ($errors->has('tieto_ing_act_use') ? ' is-invalid' : ''), 'placeholder' => 'Tieto Ing Act Use']) }}
            {!! $errors->first('tieto_ing_act_use', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            
            {{ Form::hidden('ingmother_ing_act_id', $ingredientesactivosused->ingmother_ing_act_id, ['class' => 'form-control' . ($errors->has('ingmother_ing_act_id') ? ' is-invalid' : ''), 'placeholder' => 'Ingmother Ing Act Id']) }}
            {!! $errors->first('ingmother_ing_act_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">

            {{ Form::hidden('cult_ing_act_id', $ingredientesactivosused->cult_ing_act_id, ['class' => 'form-control' . ($errors->has('cult_ing_act_id') ? ' is-invalid' : ''), 'placeholder' => 'Cult Ing Act Id']) }}
            {!! $errors->first('cult_ing_act_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">

            {{ Form::hidden('bb_ing_act_id', $ingredientesactivosused->bb_ing_act_id, ['class' => 'form-control' . ($errors->has('bb_ing_act_id') ? ' is-invalid' : ''), 'placeholder' => 'Bb Ing Act Id']) }}
            {!! $errors->first('bb_ing_act_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <input type="hidden" name="idtieto" value="{{$idtieto}}">
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">enviar</button>
    </div>
</div>