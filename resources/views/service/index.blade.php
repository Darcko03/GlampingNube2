@extends('adminlte::page')

@section('template_title')
    Service
@endsection

@section('content')
@if (auth()->user()->hasPermissionTo('services'))
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Servicios') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('services.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Estado</th>
										<th>Precio</th>
										<th>Cantidad</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $service->name }}</td>
											<td>{{ $service->state == 0 ? 'Activo' : 'Inactivo'  }}</td>
											<td>{{ $service->price }}</td>
											<td>{{ $service->quantity }}</td>

                                            <td>
                                                <form action="{{ route('services.destroy',$service->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('services.show',$service->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('services.edit',$service->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $services->links() !!}
            </div>
        </div>
    </div>
    @else
    <h3><b>No tienes Permisos para ver esto</b></h3>
    @endif
@endsection
