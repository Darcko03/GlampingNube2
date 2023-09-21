@extends('adminlte::page')

@section('template_title')
    {{ $characteristicDome->name ?? "{{ __('Show') Characteristic Dome" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Domo-Caracteristica</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('characteristic-domes.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id del domo:</strong>
                            {{ $characteristicDome->dome_id }}
                        </div>
                        <div class="form-group">
                            <strong>Id de la caracteristica:</strong>
                            {{ $characteristicDome->characteristic_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
