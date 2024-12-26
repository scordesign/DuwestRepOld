@extends('layouts.app')

@section('template_title')
    Ingredientesactivosused
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Ingredientesactivosused') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('ingredientesactivosuseds.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Id Ing Act Use</th>
										<th>Porcentaje</th>
										<th>Desc Ing Act Use</th>
										<th>Dosis</th>
										<th>Tieto Ing Act Use</th>
										<th>Ingmother Ing Act Id</th>
										<th>Cult Ing Act Id</th>
										<th>Bb Ing Act Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ingredientesactivosuseds as $ingredientesactivosused)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $ingredientesactivosused->id_ing_act_use }}</td>
											<td>{{ $ingredientesactivosused->porcentaje }}</td>
											<td>{{ $ingredientesactivosused->desc_ing_act_use }}</td>
											<td>{{ $ingredientesactivosused->dosis }}</td>
											<td>{{ $ingredientesactivosused->tieto_ing_act_use }}</td>
											<td>{{ $ingredientesactivosused->ingmother_ing_act_id }}</td>
											<td>{{ $ingredientesactivosused->cult_ing_act_id }}</td>
											<td>{{ $ingredientesactivosused->bb_ing_act_id }}</td>

                                            <td>
                                                <form action="{{ route('ingredientesactivosuseds.destroy',$ingredientesactivosused->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('ingredientesactivosuseds.show',$ingredientesactivosused->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('ingredientesactivosuseds.edit',$ingredientesactivosused->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $ingredientesactivosuseds->links() !!}
            </div>
        </div>
    </div>
@endsection
