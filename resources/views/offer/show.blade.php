@extends('adminlte::page')

@section('template_title')
    {{ $offer->name ?? "{{ __('Show') Offer" }}
@endsection

@section('content')
@if (auth()->user()->hasPermissionTo('offers'))
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Oferta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('offers.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $offer->name }}
                        </div>
                        <div class="form-group">
                            <strong>Descuento:</strong>
                            {{ $offer->discount }}
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
