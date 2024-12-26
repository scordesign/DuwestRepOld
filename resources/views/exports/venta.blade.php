<table>
    <thead>
       

    </thead>
    <tbody>

    @foreach($Venta as $ventas)
    <tr>
        <td><b>Usuario</b></td>
       <td><b>Venta</b></td>
      </tr>
    <tr>
        <td>{{ $ventas->name }}</td>
        <td>{{ $ventas->desc }}</td>
    </tr>
    <tr>
        <td></td>
        <td><b>Nombre del producto</b></td>
        </tr>
    <tr>
        <td></td>
        <td>{{ $ventas->desc_prod_use }}</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td><b>Nombre cultivo usado</b></td>
        <td><b>Participación</b></td>
        <td><b>Dosis por hectarea en litros</b></td>
        <td><b>Número de aplicaciones al año</b></td>
        
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>{{ $ventas->desc_cult_use }}</td>
        <td>{{ $ventas->participacion }}</td>
        <td>{{ $ventas->litros }}</td>
        <td>{{ $ventas->aplicaciones }}</td>
        
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><b>Nombre del blanco biologico</b></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>{{ $ventas->desc_bb_use }}</td>
        
    </tr>
@endforeach
</tbody>
</table>