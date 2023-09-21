@extends('adminlte::page')

@section('template_title')
    Booking
@endsection

@section('content')
@if (auth()->user()->hasPermissionTo('bookings'))
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Reservas') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('bookings.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
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
                                        <th>Cliente</th>
                                        <th>Atendido por</th>
                                        <th>Domo</th>
                                        <th>Servicios</th>

                                        <th>Fecha inicio</th>
                                        <th>Fecha fin</th>


                                        <th>Subtotal</th>
                                        <th>Descuento</th>
                                        <th>Impuestos</th>
                                        <th>Total</th>
                                        <th>Estado de pago</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $booking->customer->name }} {{$booking->customer->last_name}}</td>
                                            <td>{{ $booking->user->name }}</td>
                                            <td>
                                                @foreach ($booking->domes as $dome)
                                                    {{ $dome->name }}
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($booking->services as $service)
                                                    {{ $service->name }} 
                                                @endforeach
                                            </td>



                                            <td>{{ $booking->start_date }}</td>
                                            <td>{{ $booking->end_date }}</td>


                                            <td>{{ $booking->subtotal }}</td>
                                            <td>{{ $booking->discount }}</td>
                                            <td>{{ $booking->tax }}</td>
                                            <td>{{ $booking->total }}</td>
                                            <td>{{ $booking->state == 0 ? 'Pendiente' : 'Pagado'  }}</td>


                                            <td>
                                                <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('bookings.show', $booking->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('bookings.edit', $booking->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Borrar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $bookings->links() !!}
            </div>
        </div>
    </div>
    @else
    <h3><b>No tienes Permisos para ver esto</b></h3>
    @endif
@endsection
