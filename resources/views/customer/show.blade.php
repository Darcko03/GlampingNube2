@extends('adminlte::page')

@section('template_title')
    {{ $customer->name ?? "{{ __('Show') Customer" }}
@endsection

@section('content')
@if (auth()->user()->hasPermissionTo('customers'))
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Cliente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('customers.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $customer->name }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido:</strong>
                            {{ $customer->last_name }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $customer->email }}
                        </div>
                        <div class="form-group">
                            <strong>Numero de telefono:</strong>
                            {{ $customer->phone_number }}
                        </div>
                        <div class="form-group">
                            <strong>Cumpleaños:</strong>
                            {{ $customer->birthdate }}
                        </div>
                        <div class="form-group">
                            <strong>Ciudad:</strong>
                            {{ $customer->city }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $customer->address }}
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
