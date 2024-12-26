@extends('layouts.app')

@section('template_title')
    Update Cultivosused
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Cultivosused</span>
                    </div>
                    <div class="card-body">
                    @foreach ($cultivosuseds as $cultivosused)

                    
                        <form method="POST" action="{{ route('cultivosuseds.update', $cultivosused->id_cult_use) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('cultivosused.form')
                            @endforeach  
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
