@extends('adminlte::page')

@section('template_title')
    {{ $permission->name ?? "{{ __('Show') Permission" }}
@endsection

@section('content')
@if (auth()->user()->hasPermissionTo('permissions'))
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Permiso</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('permissions.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $permission->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    @else
    <h3><b>No tienes Permisos para ver esto</b></h3>
    @endif
@endsection
