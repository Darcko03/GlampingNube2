<?php

namespace App\Http\Controllers;

use App\Models\ServiceDetail;
use Illuminate\Http\Request;

/**
 * Class ServiceDetailController
 * @package App\Http\Controllers
 */
class ServiceDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceDetails = ServiceDetail::paginate();

        return view('service-detail.index', compact('serviceDetails'))
            ->with('i', (request()->input('page', 1) - 1) * $serviceDetails->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serviceDetail = new ServiceDetail();
        return view('service-detail.create', compact('serviceDetail'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ServiceDetail::$rules);

        $serviceDetail = ServiceDetail::create($request->all());

        return redirect()->route('service-details.index')
            ->with('success', 'ServiceDetail created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serviceDetail = ServiceDetail::find($id);

        return view('service-detail.show', compact('serviceDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serviceDetail = ServiceDetail::find($id);

        return view('service-detail.edit', compact('serviceDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ServiceDetail $serviceDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceDetail $serviceDetail)
    {
        request()->validate(ServiceDetail::$rules);

        $serviceDetail->update($request->all());

        return redirect()->route('service-details.index')
            ->with('success', 'ServiceDetail updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $serviceDetail = ServiceDetail::find($id)->delete();

        return redirect()->route('service-details.index')
            ->with('success', 'ServiceDetail deleted successfully');
    }
}
