@extends('layouts.app')

@section('template_title')
    Cultivosused
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Cultivosused') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('cultivosuseds.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        
										<th>Id Cult Use</th>
										<th>Desc Cult Use</th>
										<th>Participacion</th>
										<th>Litros</th>
										<th>Aplicaciones</th>
										<th>Cultivos Cult Use</th>
										<th>Cultivo Venta Id</th>
										<th>Cultivo Prod Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cultivosuseds as $cultivosused)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $cultivosused->id_cult_use }}</td>
											<td>{{ $cultivosused->desc_cult_use }}</td>
											<td>{{ $cultivosused->participacion }}</td>
											<td>{{ $cultivosused->litros }}</td>
											<td>{{ $cultivosused->aplicaciones }}</td>
											<td>{{ $cultivosused->cultivos_cult_use }}</td>
											<td>{{ $cultivosused->cultivo_venta_id }}</td>
											<td>{{ $cultivosused->cultivo_prod_id }}</td>

                                            <td>
                                                <form action="{{ route('cultivosuseds.destroy',$cultivosused->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('cultivosuseds.show',$cultivosused->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('cultivosuseds.edit',$cultivosused->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $cultivosuseds->links() !!}
            </div>
        </div>
    </div>
@endsection
