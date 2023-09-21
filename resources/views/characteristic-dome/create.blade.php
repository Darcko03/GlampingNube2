@extends('adminlte::page')

@section('template_title')
    {{ __('Create') }} Characteristic Dome
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Domo-Caracteristica</span>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('characteristic-domes.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('characteristic-domes.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('characteristic-dome.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
