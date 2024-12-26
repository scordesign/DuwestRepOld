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
                        <span class="card-title">Actualizar Precios Ing</span>
                    </div>
                    <div class="card-body">
                            

                            @include('preciosing.form')


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
