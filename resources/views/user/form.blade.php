
<h3>Modificar usuario</h3>
<form method="POST" action="{{ route('users.update', $user->id) }}"  role="form" enctype="multipart/form-data">
@csrf
<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::hidden('rol', $user->rol, ['class' => 'form-control' . ($errors->has('rol') ? ' is-invalid' : ''), 'placeholder' => 'Rol']) }}
            {!! $errors->first('rol', '<div class="invalid-feedback">:message</div>') !!}
        </div>


       


<br>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>

</form>
<br>
<h3>Agregar Municipios</h3>
@foreach($Municipiosusers as $muni)
<div class="input-group mb-3">
  <input disabled value="{{$muni->desc}}" type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">

    <form action="{{ route('Municipiosusers.destroy',$muni->id) }}" method="POST">
        @csrf
        @method('DELETE')
        {{ Form::hidden('id', $user->id, ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''), 'placeholder' => 'id']) }}
        <button type="submit" class="btn btn-outline-danger"><i class="fa fa-fw fa-trash"></i>Eliminar</button>
    </form>

  </div>
</div>
    @endforeach

<form action="{{ route('Municipiosusers.store') }}" method="POST">
@csrf
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">municipios</span>
  </div>
  <select class="form-control" name="id_muni" aria-label="multiple select example">
        @foreach($Municipios as $muni)
    <option value="{{$muni->id}}">{{$muni->desc}}</option>
    @endforeach
       
</select>
{{ Form::hidden('id', $user->id, ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''), 'placeholder' => 'id']) }}

<div class="input-group-append">
    <button class="btn btn-outline-success" type="submit">Agregar</button>
  </div>
</div>

</form>



@if (Auth::user()->rol=='admin')
<h3>Agregar productos a vender</h3>


 @foreach($productosxuser as $poxus)
<div class="input-group mb-3">
  <input disabled value="{{$poxus->nombre   }}" type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">

    <form action="{{ route('Productosxusers.destroy',$poxus->id) }}" method="POST">
        @csrf
        @method('DELETE')
        {{ Form::hidden('id', $user->id, ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''), 'placeholder' => 'id']) }}
        <button type="submit" class="btn btn-outline-danger"><i class="fa fa-fw fa-trash"></i>Eliminar</button>
    </form>

  </div>
</div>
    @endforeach 

<form action="{{ route('Productosxusers.store') }}" method="POST">
@csrf
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Productos</span>
  </div>
  <select class="form-control" name="id_produc" aria-label="multiple select example">
        @foreach($productos as $produ)
    <option value="{{$produ->id}}">{{$produ->nombre}}</option>
    @endforeach
       
</select>
{{ Form::hidden('id', $user->id, ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''), 'placeholder' => 'id']) }}

<div class="input-group-append">
    <button class="btn btn-outline-success" type="submit">Agregar</button>
  </div>
</div>

</form>
@endif
</div>