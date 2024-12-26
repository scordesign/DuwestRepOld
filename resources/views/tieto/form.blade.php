<div class="box box-info padding-1">
@foreach($tietocreadarecien as $tieto)


<div class="box-body">  
    <div class="input-group input-group-lg">
    <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-lg"> <button type="button" class="btn  btn-lg">Descripción nuevo tieto</button> </span>
    </div>
    <input disabled value="{{$tieto->desc}}" type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
    </div>

    <br>
    <style>
        .vis{
            display: none;
        }
    </style>
@if ($cultivostietos->count() == 0)
    <form action="{{route('Cultivostietos.store')}}"  method="POST">

    <div class="input-group mb-3">
    <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">Cultivo</label>
    </div>
        @csrf
        <select name="cultmother_cult_ti_id" class="form-select">
        @foreach($cultivos as $cult)
            <option value="{{$cult->id}}">{{$cult->cultivo}}</option>
        @endforeach
        </select>
        <input type="number" name="hectareas" class="form-control" placeholder="Hectareas">
        <input type="hidden" name="tieto_cult_ti_id" value="{{$tieto->id}}">
        <div class="input-group-append">
        <button class="btn btn-outline-success" type="submit">agregar</button>


    </div>
    </div>
    </form>
@endif
    @foreach($cultivostietos as $cultti)
            <script>

            function blanbio(cond) {
                var blancobio = document.getElementById("blanbio"+cond);
                if (blancobio.classList.contains("vis")) {
                    blancobio.classList.remove("vis");
                } else {
                    blancobio.classList.add("vis");
                }
            // if (document.getElementById("condicional"+cond) == null) {
            //     console.log('hola');
            //     var opcio = document.getElementById("condicional"+cond);
            //     opcio.classList.add("vis");
            // } else {
            //     console.log('chao');
            //     var opcio = document.getElementById("condicional0"+cond);
            //     opcio.classList.add("vis");
            // }
            }

            </script>

    
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Cultivo creado</label>
        </div>
        <input disabled value="{{$cultti->desc_cult_ti}}" type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
        <input disabled value="{{$cultti->hectareas}} Hectareas" type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
        
        <form action="{{ route('Cultivostietos.destroy',$cultti->id_cult_ti) }}" method="POST" >
    @csrf
    @method('DELETE')
    <input type="hidden" name="idtieto" value="{{$tieto->id}}">
    <button class="btn btn-outline-danger" type="submit">Eliminar</button>
    </form>

        
    <button onclick="blanbio({{$cultti->id_cult_ti}})" class="btn btn-outline-secondary" type="submit">Potencial Biológico▼</button>
    </div>
    <div class="vis" id="blanbio{{$cultti->id_cult_ti}}">
    <script>
function replace(cond) {
    var opciones = document.getElementById("opciones"+cond).value;
    var opcion0 = document.getElementById("opcion0"+cond);
    var opcion1 = document.getElementById("opcion1"+cond);
    if (Number(opciones) == 0) {
            opcion1.classList.add("vis");
        opcion0.classList.remove("vis");
    } else {

            opcion0.classList.add("vis");
        opcion1.classList.remove("vis");
    }
    
}
        </script>

    
    
    
<div class="container p-3 my-3 bg-light border">
    <h3>agregar Blanco Biologico</h3>
    <form action="{{route('Blancosbiologicostietos.store')}}" id="condicional0{{$cultti->id_cult_ti}}"  method="POST">
            @csrf
            <input type="hidden" name="tieto_bb_ti_id" value="{{$tieto->id}}">
            <input type="hidden" name="cultivo_bb_ti_id" value="{{$cultti->id_cult_ti}}">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Seleccione Blanco biologico</label>
                </div>
                <select  class="form-select" name="bbmother_bb_ti_id" >
                @foreach($blancosbiologicos as $blacobiol)
                    <option value="{{$blacobiol->id}}">{{$blacobiol->blancobiologico}}</option>
                @endforeach
                </select>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Temporadas de mayor aplicación</label>
                </div>
                <select onchange="replace({{$cultti->id_cult_ti}})" name="temp_aplica" class="form-select"  id="opciones{{$cultti->id_cult_ti}}">
                    <option selected disabled>seleccione</option>
                    <option value="0">Climatico</option>
                    <option value="1">Mensual</option>
                </select>
            </div>

            <div class="vis input-group mb-3" id="opcion0{{$cultti->id_cult_ti}}">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Seleccione clima</label>
                </div>
                <select class="form-select" name="clima" >
                <option selected>Seleccione</option>
                    <option value="Lluvioso">Lluvioso</option>
                    <option value="Calido">Calido</option>
                </select>
            </div>

                
                

            <div class="vis input-group mb-3" id="opcion1{{$cultti->id_cult_ti}}">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Seleccione meses <br> 
                    (para seleccionar varios meses <br> presione control mas click)</span>
                </div>
                <select class="form-select" multiple name="meses[]" aria-label="multiple select example">
                <option selected >Seleccione</option>
                <option value="Enero">Enero</option>
                <option value="Febrero">Febrero</option>
                <option value="Marzo">Marzo</option>
                <option value="Abril">Abril</option>
                <option value="Mayo">Mayo</option>
                <option value="Junio">Junio</option>
                <option value="Julio">Julio</option>
                <option value="Agosto">Agosto</option>
                <option value="Septiembre">Septiembre</option>
                <option value="Octubre">Octubre</option>
                <option value="Noviembre">Noviembre</option>
                <option value="Diciembre">Diciembre</option>
                </select>        
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Número de aplicaciones al año
                        en promedio</span>
                </div>
                    <input type="text" name="num_apli" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Incidencia sobre el area cultivada</span>
            </div>
            <input name="Incidencia" type="number" step="0.01" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <input type="submit" style="width:100%;" class="btn btn-primary btn-block" value="agregar Blanco Biologico">

    </form>
    </div>
    <br>
    @foreach($blancosbiologicostietos as $blacobiotieto)
    @if ($blacobiotieto->cultivo_bb_ti_id == $cultti->id_cult_ti)
    

   <div class="container p-3 my-3 bg-white border" id="condicional{{$cultti->id_cult_ti}}">     
<div class="container p-3 my-3 bg-light border">
<h3> Blanco biologico "{{$blacobiotieto->desc_bb_ti}}"</h3>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
            </div>
            <input value="Incidencia sobre el area cultivada: {{$blacobiotieto->incidencia}}" type="text" disabled class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            <input value="Temporadas de mayor aplicación: {{$blacobiotieto->temp_aplica}}" type="text" disabled class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
              </div>
            <input value="Número de aplicaciones al año en promedio: {{$blacobiotieto->num_apli}}" type="text" disabled class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
        </div>

        <form  action="{{ route('Blancosbiologicostietos.destroy',$blacobiotieto->id_bb_ti) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" name="idtieto" value="{{$tieto->id}}">
            <button style="width:99.8%;" type="submit" class="btn btn-outline-danger "><i class="fa fa-fw fa-trash"></i> Eliminar</button>
        </form>
        <br>
        <form action="{{ route('Blancosbiologicostietos.edit',$blacobiotieto->id_bb_ti) }}" method="get">
        <input type="hidden" name="idtieto" value="{{$tieto->id}}">
        <button style="width:99.8%;" type="submit" class="btn btn-outline-success "><i class="fa fa-fw fa-trash"></i> Editar</button>
        </form>
    </div>
    <h4> Ingredientes activos </h4>
        @foreach($ingredientesactivosusados as $ingactivous)
        @if ($blacobiotieto->id_bb_ti == $ingactivous->bb_ing_act_id)
        <div class="input-group mb-3">
        <input type="text" class="form-control" disabled value="{{$ingactivous->desc_ing_act_use}}" aria-describedby="basic-addon2">
        <input type="text" class="form-control" disabled value="Dosis por hectarea: {{$ingactivous->dosis}}" aria-describedby="basic-addon2">
        <input type="text" class="form-control" disabled value="Participación del mercado: {{$ingactivous->porcentaje}}%" aria-describedby="basic-addon2">
        <div class="input-group-append">
        <form style="float:right;" action="{{ route('Ingredientesactivosuseds.destroy',$ingactivous->id_ing_act_use)}}" method="POST" >
            @csrf
            @method('DELETE')
            <input type="hidden" name="idtieto" value="{{$tieto->id}}">
            <button class="btn btn-outline-danger" type="submit">Eliminar</button>
        </form>
        <form style="float:right;" action="{{ route('Ingredientesactivosuseds.edit',$ingactivous->id_ing_act_use)}}" method="get" >
            <input type="hidden" name="idtieto" value="{{$tieto->id}}">
            <button class="btn btn-outline-success" type="submit">Editar</button>
        </form>
        </div>
        </div>
        @endif
        @endforeach
        <h4>Agregar ingredientes activos </h4>
    <form action="{{route('Ingredientesactivosuseds.store')}}" method="post">
    @csrf
            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Ingrediente activo</span>
            </div>
            <select class="form-select" onchange="pre({{$blacobiotieto->id_bb_ti}})" name="ingmother_ing_act_id" id="ingrediente{{$blacobiotieto->id_bb_ti}}">
            @foreach($Ingredientesactivo as $ingactivo)
                <option value="{{$ingactivo->id}}">{{$ingactivo->nombre}}</option>
            @endforeach
            </select>
            </div>


            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Participación del mercado</span>
            </div>
            <input name="porcentaje" max="100" type="number" class="form-control" step="0.01">
            <div class="input-group-append">
                <span class="input-group-text">%</span>
            </div>
            </div>

            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Dosis por hectarea</span>
            </div>
            <input name="dosis" type="number" class="form-control" step="0.01" >
            </div>
            
            <!-- <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Precio KG/LT</span>
            </div>
             <script>
                    function pre(cond) {
                        var select = document.getElementById("ingrediente"+cond).value;
                        var buscados = document.getElementsByName("preciopcion"+cond+select);
                        var resto = document.getElementsByClassName("preciopcion"+cond);
                        var o = 0 ;
                        while (o < resto.length) {
                            resto[o].setAttribute("style","display:none;");
                            o++;
                        }
                        var i = 0 ;
                        while (i < buscados.length) {
                            buscados[i].setAttribute("style","display:unset;");
                            i++;
                        }
                    }
            </script> 

            </div> -->

            
            

            <input type="hidden" name="tieto_ing_act_use" value="{{$tieto->id}}">
            <input type="hidden" name="cult_ing_act_id" value="{{$cultti->id_cult_ti}}">
            <input type="hidden" name="bb_ing_act_id" value="{{$blacobiotieto->id_bb_ti}}">
            
            <input type="submit" style="width:100%;" class="btn btn-outline-primary btn-block" value="agregar ingredienta activo"><br>


    </form>

    </div>
        @endif
        @endforeach
    </div>
    <br>

    

@endforeach

</div> 
</div>
<div style="display:flex;">
<!-- <form action="{{route('tietos.store')}}" method="POST" style="width:33.333333333333333333333333333333%;">
    @csrf
    
    <input type="hidden" name="idtieto" value="{{$tieto->id}}">   
    <input type="hidden" name="estado" value="1">   
    <input type="submit" style="width:100%;" class="btn btn-outline-success btn-lg btn-block" value="terminar">
    </form> -->
    <form action="{{route('tietos.store')}}"  method="POST" style="width:50%;">
    @csrf
    
    <input type="hidden" name="idtieto" value="{{$tieto->id}}">   
    <input type="hidden" name="estado" value="1">     
    <input type="hidden" name="nombre" value="@foreach($cultivostietos as $cultus) {{$cultus->desc_cult_ti}} @foreach($blancosbiologicostietos as $blacobiotieto) ({{$blacobiotieto->blancobiologico}})
    @endforeach
    @endforeach
    ">     
    <input type="submit" style="width:100%;" class="btn btn-outline-primary btn-lg btn-block" value="Guardar">
    </form>

    <form action="{{ route('tietos.destroy',$tieto->id) }}" method="POST" style="width:50%;">
    @csrf
    @method('DELETE')
        <input type="submit" style="width:100%;" class="btn btn-outline-danger btn-lg btn-block" value="Eliminar">
    </form>
    
    </div>

    @endforeach
</div>