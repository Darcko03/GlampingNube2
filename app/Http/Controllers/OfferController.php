<?php

namespace App\Http\Controllers;

use App\Models\offer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOffer;

/**
 * Class OfferController
 * @package App\Http\Controllers
 */
class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = offer::paginate(10);

        return view('offer.index', compact('offers'))
            ->with('i', (request()->input('page', 1) - 1) * $offers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $offer = new offer();
        return view('offer.create', compact('offer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOffer $request)
    {
        request()->validate(offer::$rules);

        $offer = offer::create($request->all());

        return redirect()->route('offers.index')
            ->with('success', 'Offer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offer = offer::find($id);

        return view('offer.show', compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offer = offer::find($id);

        return view('offer.edit', compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Offer $offer
     * @return \Illuminate\Http\Response
     */
    public function update(StoreOffer $request, offer $offer)
    {
        request()->validate(offer::$rules);

        $offer->update($request->all());

        return redirect()->route('offers.index')
            ->with('success', 'Offer updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $offer = offer::find($id)->delete();

        return redirect()->route('offers.index')
            ->with('success', 'Offer deleted successfully');
    }
}
