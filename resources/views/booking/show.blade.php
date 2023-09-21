@extends('adminlte::page')

@section('template_title')
    {{ $booking->name ?? "{{ __('Show') Booking" }}
@endsection

@section('content')
@if (auth()->user()->hasPermissionTo('bookings'))
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Reserva</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('bookings.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Cliente:</strong>
                            {{ $booking->customer->name }} {{ $booking->customer->last_name }}
                        </div>
                        <div class="form-group">
                            <strong>Usuario:</strong>
                            {{ $booking->user->name }}
                        </div>

                        <div class="form-group">
                            <strong>Domo:</strong>
                            @foreach ($booking->domes as $dome)
                                {{ $dome->name }}
                            @endforeach
                        </div>

                        <div class="form-group">
                            <strong>Servicios:</strong>
                            @foreach ($booking->services as $service)
                                {{ $service->name }}-
                            @endforeach
                        </div>

                        <div class="form-group">
                            <strong>Fecha inicio:</strong>
                            {{ $booking->start_date }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha fin:</strong>
                            {{ $booking->end_date }}
                        </div>


                        <div class="form-group">
                            <strong>Subtotal:</strong>
                            {{ $booking->subtotal }}
                        </div>
                        <div class="form-group">
                            <strong>Descuento:</strong>
                            {{ $booking->discount }}
                        </div>
                        <div class="form-group">
                            <strong>Impuestos:</strong>
                            {{ $booking->tax }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $booking->total }}
                        </div>
                        <div class="form-group">
                            <strong>Estado de pago:</strong>
                            {{ $booking->state == 0 ? 'Pendiente' : 'Pagado'  }}
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
