@extends('adminlte::page')

@section('template_title')
    {{ $characteristic->name ?? "{{ __('Show') Characteristic" }}
@endsection

@section('content')
@if (auth()->user()->hasPermissionTo('characteristics'))
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Caracteristica</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('characteristics.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $characteristic->state }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $characteristic->description }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $characteristic->name }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $characteristic->price }}
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
