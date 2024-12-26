@extends('layouts.app')

@section('template_title')
    Productosxuser
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Productos x usuario') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('productosxusers.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Id Usu</th>
										<th>Id Produc</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productosxusers as $productosxuser)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $productosxuser->id_usu }}</td>
											<td>{{ $productosxuser->id_produc }}</td>

                                            <td>
                                                <form action="{{ route('productosxusers.destroy',$productosxuser->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('productosxusers.show',$productosxuser->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('productosxusers.edit',$productosxuser->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $productosxusers->links() !!}
            </div>
        </div>
    </div>
@endsection
