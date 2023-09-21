@extends('adminlte::page')

@section('template_title')
    {{ $rolePermission->name ?? "{{ __('Show') Role Permission" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Rol-Permiso</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('role-permissions.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id del Permiso:</strong>
                            {{ $rolePermission->permission_id }}
                        </div>
                        <div class="form-group">
                            <strong>Id del Rol:</strong>
                            {{ $rolePermission->role_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
