<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Stats;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Illuminate\Http\Request;

class ClubController extends Controller
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
    public function playerClubHistory($playerId)
    {
        //
        $stats = Club::where('player_id','=', $playerId)->get();

        return response()->json($stats, ResponseAlias::HTTP_OK);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $data = Club::create([
               'player_id' => $request->player_id,
                'club_name' => $request->club_name,
            ]);

            return response()->json($data, ResponseAlias::HTTP_CREATED);
        }
        catch (\Exception $e)
        {
            Log::error($e->getMessage());

            return response()->json([
                'message' => 'Something went wrong while adding clubs!!',
                "error" => $e,
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        $data = Club::where('player_id', $request->player_id)->get();

        return response()->json($data, ResponseAlias::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Club $club)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Club $club)
    {
        //
    }
}
