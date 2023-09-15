<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $searchString = $request->query('q', '');

        // $users = User::with('specializations', 'doctor')->where('name', 'LIKE', "%{$searchString}%")->paginate(5);


        $specializationId = $request->query('specialization');


        $query = User::with('specializations', 'doctor', 'doctor.promotions', 'doctor.reviews');

        if ($searchString) {
            $query = $query->where(function ($query) use ($searchString) {
                $query->where('name', 'LIKE', "%{$searchString}%")
                      ->orWhere('lastname', 'LIKE', "%{$searchString}%");
            });
        }



        if ($specializationId) {
            $query->whereHas('specializations', function ($q) use ($specializationId) {
                $q->where('id', $specializationId);
            });
        }

        $users = $query->paginate(100);

        return response()->json([
            'success' => true,
            'results' => $users,
        ]);
    }

    public function show($slug)
    {
        $user = User::with('specializations', 'doctor')->where('slug', $slug)->first();

        return response()->json([
            'success' => true,
            'results' => $user,
        ]);
    }
}
