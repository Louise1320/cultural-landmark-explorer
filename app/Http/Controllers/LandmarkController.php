<?php

namespace App\Http\Controllers;

use App\Models\Landmark;
use App\Models\Favorite;
use Illuminate\Http\Request;

class LandmarkController extends Controller
{
    public function show(Landmark $landmark)
    {
        $sessionId  = session()->getId();
        $isFavorite = Favorite::where('session_id', $sessionId)
                               ->where('landmark_id', $landmark->id)
                               ->exists();

        $related = Landmark::byCountry($landmark->country)
                            ->where('id', '!=', $landmark->id)
                            ->take(10)
                            ->get();

        return view('landmark', compact('landmark', 'isFavorite', 'related'));
    }

    public function toggleFavorite(Request $request, Landmark $landmark)
    {
        // ✅ Make sure session is started
        if (!session()->isStarted()) {
            session()->start();
        }

        $sessionId = session()->getId();

        $existing = Favorite::where('session_id', $sessionId)
                             ->where('landmark_id', $landmark->id)
                             ->first();

        if ($existing) {
            $existing->delete();
            $status = 'removed';
        } else {
            Favorite::create([
                'session_id'  => $sessionId,
                'landmark_id' => $landmark->id,
            ]);
            $status = 'added';
        }

        // ✅ Save session para consistent
        session()->save();

        return response()->json([
            'status'    => $status,
            'favorites' => Favorite::where('session_id', $sessionId)->count(),
        ]);
    }

    public function favorites()
    {
        // ✅ Make sure session is started
        if (!session()->isStarted()) {
            session()->start();
        }

        $sessionId = session()->getId();

        $landmarks = Landmark::whereHas('favorites', function ($q) use ($sessionId) {
            $q->where('session_id', $sessionId);
        })->get();

        return view('favorites', compact('landmarks'));
    }
}