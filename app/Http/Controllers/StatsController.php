<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Stats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class StatsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //


    }

    /**
     * Display a listing of the resource.
     */
    public function playerStats($playerId)
    {
        //
        $stats = Stats::where('player_id','=', $playerId)->first();

        return response()->json($stats, ResponseAlias::HTTP_OK);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        try {
            $stats = Stats::create([
                'player_id' => $request->player_id,
                'player_name' => $request->player_name,
//                'games_played' => $request->games_played,
//                'goals' => $request->goals,
//                'assists' => $request->assists,
//                'saves' => $request->saves,
//                'tackles_won' => $request->tackles_won,
            ]);
            $data = Rating::create([
//                'speed' => $request->speed,
//                'passing_accuracy' => $request->passing_accuracy,
//                'shot_power' => $request->shot_power,
//                'dribbling' => $request->dribbling,
//                'defense' => $request->defense,
//                'physical' => $request->physical,
//                'total_rating' => $total_rating,
                'player_id' => $request->player_id,
                'player_name' => $request->player_name
            ]);

            return response()->json($stats, ResponseAlias::HTTP_CREATED);
        }catch (\Exception $e)
        {
            Log::error($e->getMessage());

            return response()->json([
                'message' => 'Something went wrong while adding stats!!',
                "error" => $e,
            ], 500);

        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Stats $stats)
    {
        //
        return response()->json($stats, ResponseAlias::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        try {
            $stat = Stats::find($id);

            $stat->update($request->all());

            return response()->json($stat, ResponseAlias::HTTP_OK);

        }catch (\Exception $e)
        {
            Log::error($e->getMessage());

            return response()->json([
                'message' => 'Something went wrong while adding stats!!',
                "error" => $e,
            ], 500);

        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stats $stats)
    {
        //
    }
}
