@extends('adminlte::page')



@section('template_title')
    Caracteristicas
@endsection

@section('content')
@if (auth()->user()->hasPermissionTo('characteristics'))
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Caracteristicas') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('characteristics.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Descripcion</th>
										
										

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($characteristics as $characteristic)
                                        <tr>
                                        
                                            
											<td>{{ $characteristic->name }}</td>
											<td>{{ $characteristic->description }}</td>
											
											

                                            <td>
                                                <form action="{{ route('characteristics.destroy',$characteristic->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('characteristics.show',$characteristic->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('characteristics.edit',$characteristic->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                {!! $characteristics->links() !!}
            </div>
        </div>
    </div>
    @else
    <h3><b>No tienes Permisos para ver esto</b></h3>
    @endif
@endsection
