<?php

namespace App\Http\Controllers;

use App\Models\characteristic;
use App\Models\dome;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDome;

/**
 * Class DomeController
 * @package App\Http\Controllers
 */
class domeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $domes = dome::paginate(10);

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
        $dome = new dome();
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
        request()->validate(dome::$rules);

        $dome = dome::create($request->all());

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
        
        $dome = dome::find($id);
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
        $dome = dome::find($id);
        $characteristics = characteristic::all();

        return view('dome.edit', compact('dome','characteristics'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Dome $dome
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDome $request, dome $dome)
    {
        request()->validate(dome::$rules);

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
        $dome = dome::find($id)->delete();

        return redirect()->route('domes.index')
            ->with('success', 'Domo eliminado satisfactoriamente');
    }
}
