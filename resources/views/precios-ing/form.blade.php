<div class="box box-info padding-1">
    <input type="hidden" name="count" value="{{ $preciosIng->count()}}">
    <div class="box-body">
    <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Precio</span>
  </div>
  <input name="precio" type="text" class="form-control" placeholder="Precio" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Marca comercial</span>
  </div>
  <input name="marca_comercial" type="text" class="form-control" placeholder="Marca comercial" aria-label="Username" aria-describedby="basic-addon1">
</div>
<input type="hidden" name="idingact" value="{{$id}}">
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-success">Agregar</button>
    </div>
</div>