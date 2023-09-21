@extends('adminlte::page')

@section('template_title')
    {{ __('Update') }} Payment Method
@endsection

@section('content')
@if (auth()->user()->hasPermissionTo('payment-methods'))
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Editar') }} Metodo de pago</span>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('payment-methods.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('payment-methods.update', $paymentMethod->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('payment-method.form')

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
