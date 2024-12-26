@if (Auth::user()->rol=='admin')@extends('layouts.app')

@section('template_title')
    Blancosbiologico
@endsection
@endif
@section('content')
@if (Auth::user()->rol=='admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Blancos biologicos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('blancosbiologicos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Blanco biologico</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blancosbiologicos as $blancosbiologico)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $blancosbiologico->blancobiologico }}</td>

                                            <td>
                                                <form action="{{ route('blancosbiologicos.destroy',$blancosbiologico->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('blancosbiologicos.show',$blancosbiologico->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('blancosbiologicos.edit',$blancosbiologico->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $blancosbiologicos->links() !!}
            </div>
        </div>
    </div>
    @else
    <div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">{{ __('no autorizado') }}</div>
        <center>
        <br><h3>Usuario no autorizado pongase en contacto con el administrador para obtener la autorizacion a este modulo </h3>
        <br><a href="{{ url('/') }}"><button style="width:100%;" type="button" class="btn btn-secondary">Inicio</button></a><br>
        </center>
        </div>
        </div>   
    </div>
        </div>
    </div>
    @endif
@endsection
