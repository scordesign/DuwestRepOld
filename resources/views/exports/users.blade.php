<table>
    <thead>
      
    </thead>
    <tbody>

    @foreach($users as $user)
 <tr>
       <td><b>Nombre</b></td>
       <td><b>Correo Electronico</b></td>
      </tr>

    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
</tr>
<tr>
        <td><b>Productos</b></td>
        <td><b>Producto asignado</b></td>
</tr>
  @foreach($productosxusers as $productos)
 @if ($user->id == $productos->id_usu)
    
    <tr>
        <td></td>
        <td>{{ $productos->nombre }}</td>
</tr>
 @endif  
@endforeach
<tr>
        <td><b>Municipios</b></td>
        <td><b>Municipio asignado</b></td>
</tr>
@foreach($municipios as $muni)
 @if ($user->id == $muni->id_usu)
    
    <tr>
        <td></td>
        <td>{{ $muni->desc }}</td>
</tr>
 @endif  
@endforeach

@endforeach

</tbody>
</table>