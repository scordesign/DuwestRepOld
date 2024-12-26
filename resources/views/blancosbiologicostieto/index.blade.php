@extends('layouts.app')

@section('template_title')
    Blancosbiologicostieto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Blancosbiologicostieto') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('blancosbiologicostietos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Id Bb Ti</th>
										<th>Incidencia</th>
										<th>Temp Aplica</th>
										<th>Num Apli</th>
										<th>Cultivo Bb Ti Id</th>
										<th>Bbmother Bb Ti Id</th>
										<th>Tieto Bb Ti Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blancosbiologicostietos as $blancosbiologicostieto)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $blancosbiologicostieto->id_bb_ti }}</td>
											<td>{{ $blancosbiologicostieto->incidencia }}</td>
											<td>{{ $blancosbiologicostieto->temp_aplica }}</td>
											<td>{{ $blancosbiologicostieto->num_apli }}</td>
											<td>{{ $blancosbiologicostieto->cultivo_bb_ti_id }}</td>
											<td>{{ $blancosbiologicostieto->bbmother_bb_ti_id }}</td>
											<td>{{ $blancosbiologicostieto->tieto_bb_ti_id }}</td>

                                            <td>
                                                <form action="{{ route('blancosbiologicostietos.destroy',$blancosbiologicostieto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('blancosbiologicostietos.show',$blancosbiologicostieto->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('blancosbiologicostietos.edit',$blancosbiologicostieto->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $blancosbiologicostietos->links() !!}
            </div>
        </div>
    </div>
@endsection
