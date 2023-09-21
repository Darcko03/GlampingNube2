@extends('adminlte::page')

@section('template_title')
    {{ $dome->name ?? "{{ __('Show') Domos" }}
@endsection

@section('content')
@if (auth()->user()->hasPermissionTo('domes'))
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Domo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('domes.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $dome->name }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $dome->state == 0 ? 'Activo' : 'Inactivo'  }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $dome->price }}
                        </div>
                        <div class="form-group">
                            <strong>Ubicacion:</strong>
                            {{ $dome->location }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $dome->description }}
                        </div>
                        <div class="form-group">
                            <strong>Capacidad:</strong>
                            {{ $dome->capacity }}
                        </div>
                        <div class="form-group">
                            <strong>Caracteristicas:</strong>
                             @foreach ($dome->characteristics as $caracteristica)
                                                {{ $caracteristica->name }} / @endforeach 
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
