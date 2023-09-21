<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\dome;
use App\Models\offer;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class BookingController
 * @package App\Http\Controllers
 */
class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::paginate();
        $customers =Customer::all();

        return view('booking.index', compact('bookings'))
            ->with('i', (request()->input('page', 1) - 1) * $bookings->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $booking = new Booking();
        $customers = Customer::all();
        $domes = dome::all();
        $users = User::all();
        $offers = offer::all();
        $services = Service::all();
        return view('booking.create', compact('booking','customers','domes','users','offers','services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */



     public function store(Request $request)
{
    // Validación de datos
    $request->validate([
        'customer' => 'required|exists:customers,id',
        'user' => 'required|exists:users,id',
        'dome' => 'required|exists:domes,id',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'services' => 'array',
        'subtotal' => 'required|numeric',
        'tax' => 'required|numeric',
        'offer' => 'required|numeric',
        'total' => 'required|numeric',
        'state' => 'required',
    ]);

    // Creación de la reserva
    $booking = new Booking;
    $booking->customer_id = $request->customer;
    $booking->user_id = $request->user;
    $booking->start_date = $request->start_date;
    $booking->end_date = $request->end_date;
    $booking->subtotal = $request->subtotal;
    $booking->tax = $request->tax;
    $booking->discount = $request->offer;
    $booking->total = $request->total;
    $booking->state = $request->state;
    $booking->save();

    // Asociar un domo con un precio específico en la tabla pivote
    $booking->domes()->attach($request->dome, ['price' => $request->dome_price]);

    // Asociar servicios con precios específicos en la tabla pivote
    if ($request->has('services')) {
        $selectedServiceIds = $request->input('services'); // Obtiene los IDs de los servicios seleccionados
    
        // Asocia los servicios seleccionados con los precios en la tabla pivote
        foreach ($selectedServiceIds as $serviceId) {
            // Asegúrate de que $serviceId sea un valor válido y exista en la tabla services
            $service = Service::find($serviceId);
    
            if ($service) {
                // Asocia el servicio con su precio en la tabla pivote
                $booking->services()->attach($serviceId, ['price' => $service->price]);
            } else {
                // Manejar el caso en el que $serviceId no sea válido
            }
        }
    }

    return redirect()->route('bookings.index')
        ->with('success', 'Reserva creada exitosamente.');
}


   
    public function show($id)
    {
        $customers = Customer::all();
        $domes = dome::all();
        $users = User::all();
        $offers = offer::all();
        $services = Service::all();
        $booking = Booking::find($id);

        return view('booking.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::find($id);
        $customers = Customer::all();
        $domes = dome::all();
        $users = User::all();
        $offers = offer::all();
        $services = Service::all();

        return view('booking.edit', compact('booking','customers','domes','users','offers','services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    // Validación de datos
    $request->validate([
        'customer' => 'required|exists:customers,id',
        'user' => 'required|exists:users,id',
        'dome' => 'required|exists:domes,id',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'services' => 'array',
        'subtotal' => 'required|numeric',
        'tax' => 'required|numeric',
        'offer' => 'required|numeric',
        'total' => 'required|numeric',
        'state' => 'required',
    ]);

    // Buscar la reserva existente por su ID
    $booking = Booking::find($id);

    if (!$booking) {
        return redirect()->back()
            ->with('error', 'La reserva no existe o no se encontró.');
    }

    // Actualizar los campos de la reserva
    $booking->customer_id = $request->customer;
    $booking->user_id = $request->user;
    $booking->start_date = $request->start_date;
    $booking->end_date = $request->end_date;
    $booking->subtotal = $request->subtotal;
    $booking->tax = $request->tax;
    $booking->discount = $request->offer;
    $booking->total = $request->total;
    $booking->state = $request->state;

    // Actualizar la asociación del domo con su precio
    $booking->domes()->sync([$request->dome => ['price' => $request->dome_price]]);

    // Actualizar la asociación de los servicios con sus precios
    if ($request->has('services')) {
        $selectedServiceIds = $request->input('services'); // Obtiene los IDs de los servicios seleccionados

        // Actualiza la asociación de los servicios seleccionados con los precios en la tabla pivote
        $servicesToUpdate = [];

        foreach ($selectedServiceIds as $serviceId) {
            // Asegúrate de que $serviceId sea un valor válido y exista en la tabla services
            $service = Service::find($serviceId);

            if ($service) {
                $servicesToUpdate[$serviceId] = ['price' => $service->price];
            } else {
                // Manejar el caso en el que $serviceId no sea válido
            }
        }

        $booking->services()->sync($servicesToUpdate);
    } else {
        // Si no se seleccionan servicios, eliminar cualquier asociación existente
        $booking->services()->detach();
    }

    $booking->save();

    return redirect()->route('bookings.index')
        ->with('success', 'Reserva actualizada exitosamente.');
}

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $booking = Booking::find($id)->delete();

        return redirect()->route('bookings.index')
            ->with('success', 'Booking deleted successfully');
    }

    public function verificarReserva(Request $request)
{
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');
    $domeId = $request->input('dome_id');

    // Realiza una consulta a la base de datos para verificar si existe una reserva en el mismo día y domo.
    $reservado = Booking::where('dome_id', $domeId)
        ->whereDate('start_date', '<=', $endDate)
        ->whereDate('end_date', '>=', $startDate)
        ->exists();

    return response()->json(['reservado' => $reservado]);
}

}
