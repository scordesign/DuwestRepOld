@extends('layouts.app')

@section('template_title')
    Venta
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                        

                            <span id="card_title">
                                <h3>Venta</h3>     
                            
                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Buscar</span>
                                </div>
                                <input id="buscar" onkeyup="buscar()" type="search" class="form-control" placeholder="buscar" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </span>
                            
                            
                             <div class="float-right">
                                <a href="
                                @php
                                use App\Http\Controllers\VentaController as ventacontroler;
                                echo action([ventacontroler::class, 'create'] , ['idventa' => 0]); 
                                @endphp"
                                class="btn btn-primary btn-sm float-right"  data-placement="left">
                                 Crear Nuevo</a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <input type="hidden" id="count" value="{{ $ventas->count() }}">
                    <script>
                        function buscar() {
                            var buscar =document.getElementById("buscar").value.toLowerCase();
                            var count = Number(document.getElementById("count").value);
                            var acu = 1 ;
                            while (acu <= count) {
                                var elements = document.getElementById(acu).innerHTML.toLowerCase();
                                var element = document.getElementById(acu);
                                if (elements.includes(buscar)) {
                                    element.classList.remove("vis");
                                } else {
                                    element.classList.add("vis");
                                }
                                acu++;
                            }
                        }
                    </script>
                    <style>
                        .vis{
                            display: none;
                        }
                    </style>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										
										<th>Descripción venta</th>
										
										<th>Vendedor</th>

                                        <th>acciones 
                                            
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($ventas as $venta)
                                        <tr id="{{ ++$i }}">
                                            <td><p > {{ $i }} </p></td>
                                            
										
											<td>{{ $venta->desc }}</td>
											
											<td>{{ $venta->name }}</td>
                                            <td>
                                            @if ($venta->estado == 0)
                                            <form action="{{ route('ventas.destroy',$venta->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('ventas.show',$venta->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="
                                                    @php
                                                    echo action([ventacontroler::class, 'create'] , ['idventa' => $venta->id]); 
                                                    @endphp"
                                                    ><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                            </form>
                                            @else
                                            <a class="btn btn-sm btn-primary " href="{{ route('ventas.show',$venta->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>

                                            @endif
  
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $ventas->links() !!}
            </div>
        </div>
    </div>
@endsection
