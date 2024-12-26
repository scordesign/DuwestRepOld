<table>
    <thead>

    </thead>
    <tbody>

    @foreach($tieto as $tietos)

    <tr>
       <td><b>usuario</b></td>
       <td><b>Tieto</b></td>
      </tr>
    <tr>
        <td>{{ $tietos->name }}</td>
        <td>{{ $tietos->desc }}</td>
    </tr>
    <tr>
        <td></td>
        <td><b>Nombre Cultivo</b></td>
        <td><b>Hectareas</b></td>
    </tr>
    <tr>
        <td></td>
        <td>{{ $tietos->desc_cult_ti }}</td>
        <td>{{ $tietos->hectareas}} Hectareas</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td><b>Nombre Blanco Biologico</b></td>
        <td><b>Incidencia sobre el area cultivada</b></td>
        <td><b>Temporadas de mayor aplicacion</b></td>
        <td><b>Numero de aplicaciones al año en promedio</b></td>
        
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>{{ $tietos->desc_bb_ti }}</td>
        <td>{{ $tietos->incidencia }}</td>
        <td>{{ $tietos->temp_aplica }}</td>
        <td>{{ $tietos->num_apli }}</td>
        
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><b>Nombre ingrediente activo</b></td>
        <td><b>Participacion del mercado</b></td>
        <td><b>Dosis por hectarea</b></td>
        <td><b>Precio KG/LT</b></td>
        <td><b>Marce comercial</b></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>{{ $tietos->desc_ing_act_use }}</td>
        <td>{{ $tietos->porcentaje }}</td>
        <td>{{ $tietos->dosis }}</td>
        <td>{{ $tietos->precio }}</td>
        <td>{{ $tietos->marcacomercial }}</td>
        
    </tr>
@endforeach
</tbody>
</table>