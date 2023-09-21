<?php

namespace App\Http\Controllers;

use App\Models\Characteristic;
use App\Models\Dome;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDome;

/**
 * Class DomeController
 * @package App\Http\Controllers
 */
class DomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $domes = Dome::paginate(10);

        return view('dome.index', compact('domes'))
            ->with('i', (request()->input('page', 1) - 1) * $domes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $characteristics = Characteristic::all();
        $dome = new Dome();
        return view('dome.create', compact('dome','characteristics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDome $request)
    {
        request()->validate(Dome::$rules);

        $dome = Dome::create($request->all());

        $dome->characteristics()->sync($request->input('characteristics'));

        return redirect()->route('domes.index')
            ->with('success', 'Domo creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $dome = Dome::find($id);
        $characteristics = Characteristic::all();

        return view('dome.show', compact('dome','characteristics'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dome = Dome::find($id);
        $characteristics = Characteristic::all();

        return view('dome.edit', compact('dome','characteristics'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Dome $dome
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDome $request, Dome $dome)
    {
        request()->validate(Dome::$rules);

        $dome->update($request->all());

        $dome->characteristics()->sync($request->input('characteristics'));

        return redirect()->route('domes.index')
            ->with('success', 'Domo actualizado satisfactoriamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $dome = Dome::find($id)->delete();

        return redirect()->route('domes.index')
            ->with('success', 'Domo eliminado satisfactoriamente');
    }
}
