<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function store(Request $request, Offer $offer)
    {
        
        if ($offer->user_id === Auth::id()) {
            return back()->with('error', 'No puedes inscribirte a tu propia oferta.');
        }

        
        $alreadyApplied = Application::where('user_id', Auth::id())
                                     ->where('offer_id', $offer->id)
                                     ->exists();
        
        if ($alreadyApplied) {
            return back()->with('error', 'Ya estás inscrito en esta oferta.');
        }

        
        Application::create([
            'user_id' => Auth::id(),
            'offer_id' => $offer->id,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Te has inscrito a la oferta.');
    }

    
    public function destroy(Offer $offer)
    {
        
        $application = Application::where('user_id', Auth::id())
                                  ->where('offer_id', $offer->id)
                                  ->first();

        if ($application) {
            $application->delete();
            return back()->with('success', 'Has cancelado tu inscripción.');
        }

        return back()->with('error', 'No estabas inscrito en esta oferta.');
    }
}
