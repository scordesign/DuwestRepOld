@extends('layouts.app')

@section('template_title')
    Update Precios Ing
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Precios Ing</span>
                    </div>
                    <div class="card-body">
                    @foreach ($preciosIngredientes as $precios)
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Marca comercial existente</span>
                    </div>
                      <input disabled value="{{$precios->marca_comercial}}" type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                      <input disabled value="{{$precios->Precio}}" type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        
                        <form action="{{ route('precios_ings.destroy',$precios->id_pre_ing) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="marca" value="{{$precios->marca_comercial}}">
                                                    <button class="btn btn-outline-danger" type="submit">Eliminar</button>                                                </form>
                      </div>
                    </div>			
                    @endforeach
                        <form method="POST" action="{{ route('precios_ings.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('precios-ing.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">2022 Copyright:
    <a href="/"> ScorDesign.com</a>
  </div>
  <!-- Copyright -->

</footer>
@endsection
