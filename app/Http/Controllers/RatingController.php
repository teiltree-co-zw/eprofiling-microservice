<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $total_rating = (
                $request->speed + $request->passing_accuracy + $request->shot_power
                + $request->dribbling + $request->defense + $request->physical) / 600;

            $data = Rating::create([
               'speed' => $request->speed,
                'passing_accuracy' => $request->passing_accuracy,
                'shot_power' => $request->shot_power,
                'dribbling' => $request->dribbling,
                'defense' => $request->defense,
                'physical' => $request->physical,
                'total_rating' => $total_rating,
                'player_id' => $request->player_id,
                'player_name' => $request->player_name
            ]);

            return response()->json($data, ResponseAlias::HTTP_CREATED);

        }
        catch (\Exception $e) {
            Log::error($e->getMessage());

            return response()->json([
                'message' => 'Something went wrong while adding ratings!!',
                "error" => $e,
            ], 500);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show($player_id)
    {
        //
        $rating = Rating::where('player_id', $player_id)->get();
        return response()->json($rating, ResponseAlias::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rating $rating)
    {
        //
        $total_rating = (
                $request->speed + $request->passing_accuracy + $request->shot_power
                + $request->dribbling + $request->defense + $request->physical) / 6;

        $rating->update([
            'speed' => $request->speed,
            'passing_accuracy' => $request->passing_accuracy,
            'shot_power' => $request->shot_power,
            'dribbling' => $request->dribbling,
            'defense' => $request->defense,
            'physical' => $request->physical,
            'total_rating' => $total_rating,
        ]);

        return response()->json($rating, ResponseAlias::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
