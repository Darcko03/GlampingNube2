@extends('adminlte::page')

@section('template_title')
    Characteristic Dome
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Domo-Caracteristica') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('characteristic-domes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        <th>Id</th>
                                        
										<th>Id del Domo</th>
										<th>Id de la caracteristica</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($characteristicDomes as $characteristicDome)
                                        <tr>
                                            <td>{{ $characteristicDome->id }}</td>
                                            
											<td>{{ $characteristicDome->dome_id }}</td>
											<td>{{ $characteristicDome->characteristic_id }}</td>

                                            <td>
                                                <form action="{{ route('characteristic-domes.destroy',$characteristicDome->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('characteristic-domes.show',$characteristicDome->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('characteristic-domes.edit',$characteristicDome->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                {!! $characteristicDomes->links() !!}
            </div>
        </div>
    </div>
@endsection
