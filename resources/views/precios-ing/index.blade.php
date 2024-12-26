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
                                        
										
										<th>Ingrediente activo</th>
										
										
										

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($preciosIngs as $preciosIng)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $preciosIng->desc_ing_act_use }}</td>
											
											

                                            <td>
                                                    <a class="btn btn-sm btn-success" href="{{ route('precios_ings.edit',$preciosIng->ingmother_ing_act_id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                   
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
    <footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">2022 Copyright:
    <a href="/"> ScorDesign.com</a>
  </div>
  <!-- Copyright -->

</footer>
@endsection
