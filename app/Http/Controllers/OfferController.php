<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $activeTab = $request->input('tab', 'ofreciendo_practicas');

        $offers = Offer::where('type', $activeTab)->where('is_active', true)->latest()->get();

        return view('offers.index', compact('offers', 'activeTab'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('offers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:buscando_practicas,ofreciendo_practicas',
            'category' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $validated['user_id'] = $request->user()->id;
                    
        Offer::create($validated);

        
        return redirect()->route('offers.index', ['tab' => $validated['type']]) 
                         ->with('success', 'Publicación creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {
        return view('offers.show', compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Offer $offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer)
    {
        //
    }
}
