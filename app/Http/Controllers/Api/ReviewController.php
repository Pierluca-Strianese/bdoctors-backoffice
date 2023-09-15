<?php

namespace App\Http\Controllers\Api;

use App\Models\Doctor;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::paginate(5);

        return response()->json([
            'success' => true,
            'results' => $reviews,
        ]);
    }

    public function show(Review $review)
    {
        //
    }

    public function store(Request $request, $slug)
    {   

        // Trova il medico in base allo slug
        $doctor = Doctor::where('slug', $slug)->first();

        if (!$doctor) {
            return response()->json(['error' => 'Medico non trovato.'], 404);
        }


        // Validazione dei dati inviati dal form
        $request->validate([
            'valutation' => 'required|integer|between:1,5',
            'name' => 'required|string|max:255',
            'review' => 'nullable|string|max:5000',
        ]);


        // Creazione di una nuova recensione
        $review = new Review();
        $review->doctor_id = $doctor->id;
        $review->valutation = $request->input('valutation');
        $review->name = $request->input('name');
        $review->review = $request->input('review');
        $review->save();

        return response()->json([
            'success' => true,
            'message' => 'Recensione salvata con successo!',
        ]);
    }

}
