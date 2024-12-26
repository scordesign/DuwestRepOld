@extends('layouts.app')

@section('template_title')
    {{ $venta->name ?? 'Show Venta' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Descripci��n Detallada Venta x Cultivo
                        <a style="float:right;" class="btn btn-primary" href="{{ route('ventas.index') }}"> Volver</a>
                        </span>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg"><button type="button" class="btn btn-lg">Descripcion de Venta x Cultivo</button></span>
                            </div>
                                @foreach($ventacreada as $ventacrea)
                                    <input  value="{{$ventacrea->desc}}" disabled  type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                @endforeach
                            </div>

                            <li class="list-group-item">
                            
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Producto</span>
                                </div>

                                @foreach($prodused as $prod)
                                    <input disabled value="{{$prod->desc_prod_use}}" id="first" type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
                                @endforeach

                                <div class="input-group-append">
                                    <span class="input-group-text"> <input type="hidden" id="partotal" value="{{$sumparticipacion}}"> Participacion total: {{$sumparticipacion}}%</span>
                                </div>
                            </div>

                            </li>
                                <li class="list-group-item"><div class="card" >
                               
                                <ul class="list-group list-group-flush">
                                
                                @foreach($culused as $cult)
                                <li class="list-group-item">


                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-primary" type="button">Cultivo</button>
                                </div>
                                <input disabled value="{{$cult->desc_cult_use}}" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button">Participación</button>
                                </div>
                                <input disabled value="{{$cult->participacion}}%" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button">Dosis por hectarea en litros</button>
                                </div>
                                <input disabled value="{{$cult->litros}}" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button">Número de aplicaciones al año</button>
                                </div>
                                <input disabled value="{{$cult->aplicaciones}}" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                                </div>

                                <div class="card" >
                                    <ul class="list-group list-group-flush">
                                    @foreach($bbused as $bbuse)
                                    @if ($cult->id_cult_use == $bbuse->blancobiologico_cultivo_id)
                                        <li class="list-group-item">
                                        <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-success" type="button"> Blanco biológico </button>
                                        </div>
                                        <input disabled value="{{$bbuse->desc_bb_use}}" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                                        </div>
                                        </li>
                                        @endif
                                    @endforeach
                                    </ul>
                                </div>

                                </li>
                                @endforeach        
                                </ul>
                                </div>
                    </ul>
                </div>
            </div>
        </div>
    </section>

@endsection
