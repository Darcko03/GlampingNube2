<?php

namespace App\Http\Controllers;

use App\Models\DomeDetail;
use Illuminate\Http\Request;

/**
 * Class DomeDetailController
 * @package App\Http\Controllers
 */
class DomeDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $domeDetails = DomeDetail::paginate();

        return view('dome-detail.index', compact('domeDetails'))
            ->with('i', (request()->input('page', 1) - 1) * $domeDetails->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $domeDetail = new DomeDetail();
        return view('dome-detail.create', compact('domeDetail'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DomeDetail::$rules);

        $domeDetail = DomeDetail::create($request->all());

        return redirect()->route('dome-details.index')
            ->with('success', 'DomeDetail created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $domeDetail = DomeDetail::find($id);

        return view('dome-detail.show', compact('domeDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $domeDetail = DomeDetail::find($id);

        return view('dome-detail.edit', compact('domeDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DomeDetail $domeDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DomeDetail $domeDetail)
    {
        request()->validate(DomeDetail::$rules);

        $domeDetail->update($request->all());

        return redirect()->route('dome-details.index')
            ->with('success', 'DomeDetail updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $domeDetail = DomeDetail::find($id)->delete();

        return redirect()->route('dome-details.index')
            ->with('success', 'DomeDetail deleted successfully');
    }
}
