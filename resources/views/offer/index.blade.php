@extends('adminlte::page')

@section('template_title')
    Offer
@endsection

@section('content')
@if (auth()->user()->hasPermissionTo('offers'))
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Descuentos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('offers.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Descuento</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($offers as $offer)
                                        <tr>
                                           
                                            
											<td>{{ $offer->name }}</td>
											<td>{{ $offer->discount }}</td>

                                            <td>
                                                <form action="{{ route('offers.destroy',$offer->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('offers.show',$offer->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('offers.edit',$offer->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                {!! $offers->links() !!}
            </div>
        </div>
    </div>
    @else
    <h3><b>No tienes Permisos para ver esto</b></h3>
    @endif
@endsection
