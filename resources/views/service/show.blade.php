@extends('adminlte::page')

@section('template_title')
    {{ $service->name ?? "{{ __('Show') Service" }}
@endsection

@section('content')
@if (auth()->user()->hasPermissionTo('services'))
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Servicio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('services.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $service->name }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $service->state == 0 ? 'Activo' : 'Inactivo'  }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $service->price }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $service->quantity }}
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
