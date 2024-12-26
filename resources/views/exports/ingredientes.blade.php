<table>
    <thead>
       <tr>
       <th><b>Usuario</b></th>
       <th><b>Marca comercial</b></th>
       <th><b>Precio</b></th>
       <th><b>Nombre de ingrediente activos</b></th>
      </tr>

    </thead>
    <tbody>

    @foreach($precio as $pre)

    <tr>
        <td>{{ $pre->name }}</td>
        <td>{{ $pre->marca_comercial }}</td>
        <td>${{ $pre->Precio }}</td>
        <td>{{ $pre->desc_pre_ing }}</td>
    </tr>
@endforeach
</tbody>
</table>