@extends('layouts.app')

@section('content1')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <a href="https://duclient.duwestcolombia.com/public/usersexport">Informe usuarios</a>
                     <a href="https://duclient.duwestcolombia.com/public/usersexport">Informe Venta/Cultivo</a>
                      <a href="https://duclient.duwestcolombia.com/public/usersexport">Informe Tieto</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
