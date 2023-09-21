@extends('adminlte::page')

@section('template_title')
    {{ __('Create') }} User
@endsection

@section('content')
@if (auth()->user()->hasPermissionTo('users'))
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Usuario</span>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('users.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('user.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @else
    <h3><b>No tienes Permisos para ver esto</b></h3>
    @endif
@endsection
