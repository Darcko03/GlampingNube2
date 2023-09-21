<?php

namespace App\Http\Controllers;

use App\Models\Characteristic;
use App\Models\Dome;
use App\Models\CharacteristicDome;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDomeCharacteristic;

/**
 * Class CharacteristicDomeController
 * @package App\Http\Controllers
 */
class CharacteristicDomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $domes = Dome::all();
        $characteristics = Characteristic::all();
        $characteristicDomes = CharacteristicDome::paginate(10);

        return view('characteristic-dome.index', compact('characteristicDomes','characteristics','domes'))
            ->with('i', (request()->input('page', 1) - 1) * $characteristicDomes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $domes = Dome::all()->pluck('name', 'id')->toArray();
        $characteristics = Characteristic::all()->pluck('name', 'id')->toArray();
        $characteristicDome = new CharacteristicDome();
        return view('characteristic-dome.create', compact('characteristicDome','characteristics','domes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDomeCharacteristic $request)
    {

        request()->validate(CharacteristicDome::$rules);

        $characteristicDome = CharacteristicDome::create($request->all());

        return redirect()->route('characteristic-domes.index')
            ->with('success', 'CharacteristicDome created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $domes = Dome::all();
        $characteristics = Characteristic::all();
        $characteristicDome = CharacteristicDome::find($id);

        return view('characteristic-dome.show', compact('characteristicDome','characteristics','domes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $domes = Dome::all()->pluck('name', 'id')->toArray();
        $characteristics = Characteristic::all()->pluck('name', 'id')->toArray();
        $characteristicDome = CharacteristicDome::find($id);

        return view('characteristic-dome.edit', compact('characteristicDome','characteristics','domes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CharacteristicDome $characteristicDome
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDomeCharacteristic $request, CharacteristicDome $characteristicDome)
    {
        request()->validate(CharacteristicDome::$rules);

        $characteristicDome->update($request->all());

        return redirect()->route('characteristic-domes.index')
            ->with('success', 'CharacteristicDome updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $characteristicDome = CharacteristicDome::find($id)->delete();

        return redirect()->route('characteristic-domes.index')
            ->with('success', 'CharacteristicDome deleted successfully');
    }
}
