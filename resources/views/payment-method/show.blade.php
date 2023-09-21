@extends('adminlte::page')

@section('template_title')
    {{ $paymentMethod->name ?? "{{ __('Show') Payment Method" }}
@endsection

@section('content')
@if (auth()->user()->hasPermissionTo('payment-methods'))
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Metodo de pago</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('payment-methods.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $paymentMethod->name }}
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
