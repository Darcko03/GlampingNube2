@extends('adminlte::page')

@section('template_title')
    {{ __('Create') }} Payment Method
@endsection

@section('content')
@if (auth()->user()->hasPermissionTo('payment-methods'))
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Payment Method</span>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('payment-methods.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('payment-methods.store') }}"  role="form" enctype="multipart/form-data">
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
