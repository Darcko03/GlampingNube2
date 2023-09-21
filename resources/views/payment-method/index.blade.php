@extends('adminlte::page')

@section('template_title')
    Payment Method
@endsection

@section('content')
@if (auth()->user()->hasPermissionTo('payment-methods'))
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Metodos de pago') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('payment-methods.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($paymentMethods as $paymentMethod)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $paymentMethod->name }}</td>

                                            <td>
                                                <form action="{{ route('payment-methods.destroy',$paymentMethod->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('payment-methods.show',$paymentMethod->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('payment-methods.edit',$paymentMethod->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                {!! $paymentMethods->links() !!}
            </div>
        </div>
    </div>
    @else
    <h3><b>No tienes Permisos para ver esto</b></h3>
    @endif
@endsection
