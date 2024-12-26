@extends('layouts.app')

@section('template_title')
    Precios Ing
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Precios Ing') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('precios-ings.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Id Usu</th>
										<th>Id Ing Act</th>
										<th>Marca Comercial</th>
										<th>Precio</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($preciosIngs as $preciosIng)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $preciosIng->id_usu }}</td>
											<td>{{ $preciosIng->id_ing_act }}</td>
											<td>{{ $preciosIng->marca_comercial }}</td>
											<td>{{ $preciosIng->Precio }}</td>

                                            <td>
                                                <form action="{{ route('precios-ings.destroy',$preciosIng->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('precios-ings.show',$preciosIng->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('precios-ings.edit',$preciosIng->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $preciosIngs->links() !!}
            </div>
        </div>
    </div>
@endsection
