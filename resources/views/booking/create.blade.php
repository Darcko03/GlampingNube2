@extends('adminlte::page')

@section('template_title')
    {{ __('Create') }} Booking
@endsection

@section('content')
@if (auth()->user()->hasPermissionTo('bookings'))
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Reservacion</span>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('bookings.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('bookings.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('booking.form')

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
