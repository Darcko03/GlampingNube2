@extends('adminlte::page')

@section('template_title')
    {{ __('Create') }} Role Permission
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Rol-Permiso</span>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('role-permissions.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('role-permissions.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('role-permission.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
