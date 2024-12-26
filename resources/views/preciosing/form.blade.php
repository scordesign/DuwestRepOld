<div class="box box-info padding-1">
    <div class="box-body">
    <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Asignador de precio</span>
            </div>
            <input type="text" disabled  value="Nombre" class="form-control"  >
            <input type="text" disabled  value="Marca comercial" class="form-control"  >
            <input type="tect" disabled  value="Precio" class="form-control"  >
            </div>
        <form action="{{ route('precios_ings.update', $idtieto) }}" method="post">
        @csrf
        {{ method_field('PATCH') }}
            @php 
            $i = 1;
            @endphp
    @foreach ($PreciosIngnombre as $preciosIng)
    <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Asignar precios</span>
            </div>
            <input type="text" disabled name="nombre{{$i}}" value="{{$preciosIng->desc_pre_ing}}" class="form-control"  >
            <input type="text"  name="marcacomercial{{$i}}" value="{{$preciosIng->marca_comercial}}" class="form-control"  >
            <input type="number"  name="precio{{$i}}" value="{{$preciosIng->Precio}}" class="form-control"  >
            <input type="hidden"  name="id_ing{{$i++}}" value="{{$preciosIng->id_pre_ing}}" class="form-control"  >

        </div>
    
    @endforeach
    <input type="hidden" name="count" value="{{$PreciosIngnombre->count()}}">
    
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Asignar precios</button>
    </div>
    </form>
</div>