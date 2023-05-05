<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ReplyController extends Controller
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
            $reply = Reply::create([
                'chat_id' => $request->chat_id,
                'message' => $request->message
            ]);

            return response()->json($reply, ResponseAlias::HTTP_CREATED);
        }
        catch (\Exception $e) {

            Log::error($e->getMessage());

            return response()->json([
                'message' => 'Something went wrong while adding reply!!',
                "error" => $e,
            ], 500);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Reply $reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reply $reply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reply $reply)
    {
        //
    }
}
