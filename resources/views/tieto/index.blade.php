@extends('layouts.app')

@section('template_title')
    Tieto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <h3>Tieto</h3>
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
                                use App\Http\Controllers\TietoController as TietoController;
                                echo action([TietoController::class, 'create'] , ['idtieto' => 0]); 
                                @endphp"
                                class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  Create New</a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <input type="hidden" id="count" value="{{ $tietos->count() }}">
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
                                        
										<th>Desc</th>
										
										<th>Nombre Usuario</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tietos as $tieto)
                                        <tr  id="{{ ++$i }}">
                                            <td>{{ $i }}</td>
                                            
											<td>{{ $tieto->desc }}</td>
											
											<td>{{ $tieto->id_usu }}</td>

                                            <td>
                                                <form action="{{ route('tietos.destroy',$tieto->id) }}" method="POST">
                                                    <!-- <a class="btn btn-sm btn-primary " href="{{ route('tietos.show',$tieto->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a> -->
                                                    <a class="btn btn-sm btn-success" href="
                                                    @php
                                                    echo action([TietoController::class, 'create'] , ['idtieto' => $tieto->id]); 
                                                    @endphp"
                                                    ><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $tietos->links() !!}
            </div>
        </div>
    </div>
@endsection
