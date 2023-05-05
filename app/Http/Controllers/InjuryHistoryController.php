<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\InjuryHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class InjuryHistoryController extends Controller
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
    public function playerInjuryHistory($playerId)
    {
        //
        $stats = InjuryHistory::where('player_id','=', $playerId)->get();

        return response()->json($stats, ResponseAlias::HTTP_OK);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $data = InjuryHistory::create([
                'player_id' => $request->player_id,
                'player_name' => $request->player_name,
                'injury_date' => $request->injury_date,
                'injury_period' => $request->injury_period,
                'injury_desc' => $request->injury_desc,
            ]);

            return response()->json($data, ResponseAlias::HTTP_CREATED);
        }catch (\Exception $e)
        {
            Log::error($e->getMessage());

            return response()->json([
                'message' => 'Something went wrong while adding injury history!!',
                "error" => $e,
            ], 500);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(InjuryHistory $injuryHistory)
    {
        //
        return response()->json($injuryHistory, ResponseAlias::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InjuryHistory $injuryHistory)
    {
        //
        $injuryHistory->update($request->all());

        return response()->json($injuryHistory, ResponseAlias::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InjuryHistory $injuryHistory)
    {
        //
    }
}
