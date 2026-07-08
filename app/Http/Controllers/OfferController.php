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

        $query = Offer::with('user')
            ->where('type', $activeTab)
            ->where('is_active', true);

        if ($request->filled('category')) {
            $query->where('category', 'like', '%' . $request->category . '%');
        }

    
        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }
        
        $offers = $query->latest()->get();
        
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
        
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:buscando_practicas,ofreciendo_practicas',
            'category' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $validatedData['user_id'] = $request->user()->id;
                    
        Offer::create($validatedData);

        
        return redirect()->route('offers.index', ['tab' => $validatedData['type']]) 
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
    public function edit(Request $request, Offer $offer)
    {
        if ($offer->user_id !== $request->user()->id) {
            abort(403, 'No tienes permiso para editar esta publicación.');
        }

        return view('offers.edit', compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Offer $offer)
    {
        
        if ($offer->user_id !== $request->user()->id) {
            abort(403);
        }

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:buscando_practicas,ofreciendo_practicas',
            'category' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'is_active' => 'required|boolean',
        ]);

        $offer->update($validatedData);

        
        return redirect()->route('offers.index', ['tab' => $offer->type]) 
                         ->with('success', 'Publicación actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Offer $offer)
    {
        
        if ($offer->user_id !== $request->user()->id) {
            abort(403);
        }

        $offer->delete();

        return redirect()->route('offers.index', ['tab' => $offer->type]) 
                         ->with('success', 'Publicación eliminada correctamente.');
    }

    public function myOffers(Request $request)
    {
    $user = $request->user();
    
    
    $tab = $request->query('tab', 'creadas');

    
    $createdOffers = $user->offers()->latest()->get();

    
    $applications = $user->applications()->with('offer')->latest()->get();

    return view('offers.my-offers', compact('createdOffers', 'applications', 'tab'));
    }





}
