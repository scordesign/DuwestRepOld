@extends('layouts.app')

@section('template_title')
    Update Ingredientesactivosused
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Ingredientesactivosused</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('Ingredientesactivosuseds.update', $ingredientesactivosused->id_ing_act_use) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('ingredientesactivosused.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
