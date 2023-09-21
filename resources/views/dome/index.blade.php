@extends('adminlte::page')

@section('template_title')
    Dome
@endsection

@section('content')
@if (auth()->user()->hasPermissionTo('domes'))
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Domos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('domes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                     
                                        
										<th>Nombre</th>
										<th>Estado</th>
										<th>Precio</th>
										<th>Ubicacion</th>
										<th>Descripcion</th>
										<th>Capacidad</th>
                                        <th>Caracteristicas</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($domes as $dome)
                                        <tr>
                                            

											<td>{{ $dome->name }}</td>
											<td>{{ $dome->state == 0 ? 'Activo' : 'Inactivo'  }}</td>
											<td>{{ $dome->price }}</td>
											<td>{{ $dome->location }}</td>
											<td>{{ $dome->description }}</td>
											<td>{{ $dome->capacity }}</td>
                                            <td> @foreach ($dome->characteristics as $caracteristica)
                                                {{ $caracteristica->name }}<br>   @endforeach </td>

                                            <td>
                                                <form action="{{ route('domes.destroy',$dome->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('domes.show',$dome->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('domes.edit',$dome->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Borrar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $domes->links() !!}
            </div>
        </div>
    </div>
    @else
    <h3><b>No tienes Permisos para ver esto</b></h3>
    @endif
@endsection
