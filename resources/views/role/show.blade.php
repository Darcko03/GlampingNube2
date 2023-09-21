@extends('adminlte::page')

@section('template_title')
    {{ $role->name ?? "{{ __('Show') Role" }}
@endsection

@section('content')
@if (auth()->user()->hasPermissionTo('roles'))
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Rol</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('roles.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $role->name }}
                        </div>
                        <div class="form-group">
                            <strong>Permisos:</strong>
                            <td> @foreach ($role->permissions as $permission)
                                                {{ $permission->name }} / @endforeach </td>
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
