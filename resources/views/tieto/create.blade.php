@extends('layouts.app')

@section('template_title')
    Create Tieto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Tieto</span>
                    </div>
                    <div class="card-body">
                            @csrf

                            @include('tieto.form')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
