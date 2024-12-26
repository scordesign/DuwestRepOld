
<div class="add" id="add" onclick="add()" style="    width: 100%;
    background: black;"> <img src="http://127.0.0.1:8000/css/images/mas.png" alt=""> 
    </div>




<div class="selects">

<div class="input-group input-group-lg">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-lg"><button type="button" class="btn btn-lg">Descripcion de venta</button></span>
  </div>
    <input disabled value="{{$num}}(
    @foreach($culused as $cultu)
    {{$cultu->desc_cult_use}},
    @endforeach)"id="descfact"  type="text" class="form-control" aria-label="Amount (to the nearest dollar)">

</div>
<br>


<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text">Producto</span>
    </div>
    <input disabled value="{{$num}}" id="first" type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">

    <div class="input-group-append">
        <span class="input-group-text"> <input type="hidden" id="partotal" value="{{$sumparticipacion}}"> Participacion total: {{$sumparticipacion}}%</span>
    </div>
</div>

    


<form action="{{route('cultivosuseds.store')}}" method="post">
@csrf
    <input type="hidden" name="cultivo_venta_id" value="{{$idventa}}">
    <input type="hidden" name="cultivo_prod_id" value="{{$idprod}}">


    <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01"><button type="button" class="btn btn-sm">seleccione cultivo</button>   </label>
  </div>
  <select required class="form-select form-select-sm"  name="cultivos" id="">
        @foreach($cultivos as $cult)
        <option value="{{$cult->id}}">{{$cult->cultivo}}</option>
        @endforeach
    </select>
</div>

<script>

function parttotal() {
    var partotal = document.getElementById("partotal").value;
    var part = document.getElementById("parti").value;
    var sum = Number(partotal) + Number(part);
    if (sum > 100) {
        window.alert("la participacion total es mayor al 100% corrijalo por favor")
    } 
}

</script>
    

    <div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text">Participación</span>
    </div>
    <input required onkeyup="parttotal()" id="parti" type="number" step="0.01" name="participacion" class="form-control" aria-label="Amount (to the nearest dollar)">
    <div class="input-group-append">
        <span class="input-group-text">%</span>
    </div>
    </div>

    <div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm">Dosis por hectarea en litros</span>
    </div>
    <input required type="number" step="0.01" name="litros" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
    </div>

    <div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm">Número de aplicaciones al año</span>
    </div>
    <input  required type="text" name="aplicaciones" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
    </div>

    <input type="submit" value="agregar" class="btn btn-primary">

</form>

</div>
 
<br>


@foreach($culused as $cultu)
<div id="allcults{{$cultu->id_cult_use}}">
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span  class="input-group-text">
    <button type="button"  class="btn  btn-sm"> <span id="participa{{$cultu->id_cult_use}}">{{$cultu->participacion}}</span>  %</button>    
    </span>
  </div>
  <input disabled value="{{$cultu->desc_cult_use}}" type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <span class="input-group-text">
    <form action="{{ route('cultivosuseds.edit',$cultu->id_cult_use) }}" method="get">
    <input type="hidden" name="idventa" value="{{$idventa}}">
            <input type="submit" class="btn btn-sm btn-success" value="Editar">
            </form>&nbsp;&nbsp;
    <form action="{{ route('cultivosuseds.destroy',$cultu->id_cult_use) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="idventa" value="{{$idventa}}">
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>&nbsp;&nbsp;
            </form>
            

            <button onclick="blanbio({{$cultu->id_cult_use}})" type="submit" class="btn btn-secondary btn-sm"><i class="fa fa-fw fa-trash"></i>Agregar blancos biologicos ▼</button>
    </span>
  </div>
</div>


    

<script>

function blanbio(cond) {
    var blancobio = document.getElementById("blancobio"+cond);
    if (blancobio.classList.contains("vis")) {
        blancobio.classList.remove("vis");
    } else {
        blancobio.classList.add("vis");
    }
}

</script>

<div id="blancobio{{$cultu->id_cult_use}}" class="vis">
    @foreach($bbused as $bbuse)
    @if ($cultu->id_cult_use == $bbuse->blancobiologico_cultivo_id)
    <div class="input-group mb-3">
  <input disabled value="blanco biologico '{{$bbuse->desc_bb_use}}'" type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
            <form action="{{ route('blancosbiologicosuseds.destroy',$bbuse->id_bb_use) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="idventa" value="{{$idventa}}">
                <button type="submit" class="btn btn-outline-danger"><i class="fa fa-fw fa-trash"></i> Borrar</button>&nbsp;&nbsp;
            </form>
    </div>
    </div>
@endif

@endforeach

<form action="{{route('blancosbiologicosuseds.store')}}"  method="post">
@csrf
        <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">
            <button type="button" class="btn">seleccione blanco biologico</button>    
            </span>
        </div>

    <input type="hidden" name="blancobiologico_venta_id" value="{{$idventa}}">
    <input type="hidden" name="blancobiologico_cultivo_id" value="{{$cultu->id_cult_use}}">

    <script>
            function selecciones(cult) {
        var select = document.getElementById("select"+cult).value;
        var selected = document.getElementById("bb"+cult+select);
        
        var search = document.getElementById("allcults"+cult).innerHTML.toLowerCase();
        if (search.includes("blanco biologico '"+selected.innerHTML.toLowerCase())) {
            selected.setAttribute("disabled","disabled");
            window.alert("Seleccione otro blanco biologico ya que este ha sido agregado anteriormente");
        }
    }
    </script>

  <select class="form-select form-select-sm" onchange="selecciones({{$cultu->id_cult_use}})"  name="blancobiologico_bb_use" id="select{{$cultu->id_cult_use}}">  
  @foreach($blancosbiologicos as $bb)
       
        <option id="bb{{$cultu->id_cult_use}}{{$bb->id}}"  value="{{$bb->id}}">{{$bb->blancobiologico}}</option>
        @endforeach
    </select>
  <div class="input-group-append">
    <span class="input-group-text">
    <input type="submit" class="btn btn-success" value="agregar">
    </span>
        </div>
    </div>
    </form>
    </div>


    </div>  
@endforeach  


 

<script>

// window.onload = opem;
//     function add() {
//     var table = document.getElementById("tablas123"); 
//     var elementlist = document.getElementsByTagName("tr");
//     var add = document.getElementById("add");
//     var length = elementlist.length;
//     console.log(length - 1);
//     var newRow   = table.insertRow(length - 1);
//     var acu = 0 ;
//         while (acu < 4)  {
//             var newCell  = newRow.insertCell(acu);
//             var input = document.createElement('input');
//             input.type = "text";
//             input.id = "input" + length + acu ;
//             newCell.appendChild(input);
//             acu++;
//         }    
// }


//     function opem() {
//     var onselect = document.getElementById("first"); 
//     var cond = onselect.getAttribute("value");
//     var oscuro = document.getElementById("oscuro");
    
//     if (cond == 0) {    
//     } else {
//         console.log(cond);
//         oscuro.setAttribute("style","display:none;");
//     }
//     function ipcion(cond) {
        
//     }
// }
</script>

<!-- <div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('par') }}
            {{ Form::text('par', $venta->par, ['class' => 'form-control' . ($errors->has('par') ? ' is-invalid' : ''), 'placeholder' => 'Par']) }}
            {!! $errors->first('par', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('litros') }}
            {{ Form::text('litros', $venta->litros, ['class' => 'form-control' . ($errors->has('litros') ? ' is-invalid' : ''), 'placeholder' => 'Litros']) }}
            {!! $errors->first('litros', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('desc') }}
            {{ Form::text('desc', $venta->desc, ['class' => 'form-control' . ($errors->has('desc') ? ' is-invalid' : ''), 'placeholder' => 'Desc']) }}
            {!! $errors->first('desc', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('aplicaciones') }}
            {{ Form::text('aplicaciones', $venta->aplicaciones, ['class' => 'form-control' . ($errors->has('aplicaciones') ? ' is-invalid' : ''), 'placeholder' => 'Aplicaciones']) }}
            {!! $errors->first('aplicaciones', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_usu') }}
            {{ Form::text('id_usu', $venta->id_usu, ['class' => 'form-control' . ($errors->has('id_usu') ? ' is-invalid' : ''), 'placeholder' => 'Id Usu']) }}
            {!! $errors->first('id_usu', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div> -->
    <div style="display:flex;">

    @if ($sumparticipacion == 100 and $bbusedcount > 0)

    
    <script>
    function replace() {
        var descfact = document.getElementById("descfact").value;
        var descfact1 = document.getElementById("descfact1");
        var descfact2 = document.getElementById("descfact2");
        descfact1.setAttribute("value",descfact);
        descfact2.setAttribute("value",descfact);
    }

    </script>
<!-- 
    <form action="{{route('ventaterminas.store')}}" method="POST" style="width:33.333333333333333333333333333333%;">
    @csrf
    <input type="hidden" name="desc" id="descfact1" value="nueva factura">
    <input type="hidden" name="id_venta" value="{{$idventa}}">   
    <input type="hidden" name="estado" value="1">   
    <input type="submit" style="width:100%;" class="btn btn-outline-success btn-lg btn-block" value="terminar">
    </form> -->
    <form action="{{route('ventaterminas.store')}}"  method="POST" style="width:50%;">
    @csrf
    <input type="hidden" name="desc" id="descfact2" value="{{$num}}(
    @foreach($culused as $cultu)
    {{$cultu->desc_cult_use}},
    @endforeach )">
    <input type="hidden" name="id_venta" value="{{$idventa}}">   
    <input type="hidden" name="estado" value="0">     
    <input type="submit" style="width:100%;" class="btn btn-outline-primary btn-lg btn-block" value="Guardar">
    </form>
    <form action="{{ route('ventas.destroy',$idventa) }}" method="POST" style="width:50%;">
    @csrf
    @method('DELETE')
        <input type="submit" style="width:100%;" class="btn btn-outline-danger btn-lg btn-block" value="Eliminar">
    </form>

    @else

    
    <script>
    function replace() {
        var descfact = document.getElementById("descfact").value;
        var descfact2 = document.getElementById("descfact2");
        descfact2.setAttribute("value",descfact);
    }

    </script>

    <form action="{{route('ventaterminas.store')}}"  method="POST" style="width:50%;">
    @csrf
    <input type="hidden" name="desc" id="descfact2"  value="{{$num}}(
    @foreach($culused as $cultu)
    {{$cultu->desc_cult_use}},
    @endforeach)
    ">
    <input type="hidden" name="id_venta" value="{{$idventa}}">   
    <input type="hidden" name="estado" value="0">     
    <input type="submit" style="width:100%;" class="btn btn-outline-primary btn-lg btn-block" value="Guardar">
    </form>
    <form action="{{ route('ventas.destroy',$idventa) }}" method="POST" style="width:50%;">
    @csrf
    @method('DELETE')
        <input  type="submit" style="width:100%;" class="btn btn-outline-danger btn-lg btn-block" value="Eliminar">
    </form>
    @endif    



    </div>
    
</div>
@if ($num == "0")

<section class="oscuro" id="oscuro">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Seleccione Producto</h5>
      </div>
      <div class="modal-body">
          
      <form method="POST" action="{{route('productosuseds.store')}}"  >
      @csrf
      <input type="hidden" name="producto_venta_id" value="{{$idventa}}">
      <select name="productos_prod_use" class="form-select" aria-label="Default select example">
    @foreach($productos as $produc)
    <option value="{{$produc->id}}">{{$produc->nombre}}</option>
    @endforeach
    </select>
    <div class="modal-footer">
        <input type="submit">  </input>
    </div>
    </div>
      </form>



      </div>

    </div>

  </div>

  </section>
  @endif
    <style>
        .oscuro{
            height: 80%;
            width: 98%;
            position: fixed;
            z-index: 10;
        }
        .vis{
            display: none;
        }

    </style>
