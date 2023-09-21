<?php

namespace App\Http\Controllers;

use App\Models\characteristic;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCharacteristic;

/**
 * Class CharacteristicController
 * @package App\Http\Controllers
 */
class characteristicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $characteristics = characteristic::paginate(10);

        return view('characteristic.index', compact('characteristics'))
            ->with('i', (request()->input('page', 1) - 1) * $characteristics->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $characteristic = new characteristic();
        return view('characteristic.create', compact('characteristic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCharacteristic $request)
    {
        request()->validate(characteristic::$rules);

        $characteristic = characteristic::create($request->all());

        return redirect()->route('characteristics.index')
            ->with('success', 'Characteristic created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $characteristic = characteristic::find($id);

        return view('characteristic.show', compact('characteristic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $characteristic = characteristic::find($id);

        return view('characteristic.edit', compact('characteristic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Characteristic $characteristic
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCharacteristic $request, characteristic $characteristic)
    {
        request()->validate(characteristic::$rules);

        $characteristic->update($request->all());

        return redirect()->route('characteristics.index')
            ->with('success', 'Characteristic updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $characteristic = characteristic::find($id)->delete();

        return redirect()->route('characteristics.index')
            ->with('success', 'Characteristic deleted successfully');
    }
}
