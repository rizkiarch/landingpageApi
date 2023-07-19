<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $teams = Team::cursor();

            return response()->json([
                'message' => 'Successfully fetched teams',
                'data' => $teams
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed to fetch teams',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string',
                'position' => 'required|string'
            ]);

            $team = Team::create($data);
            return response()->json([
                'message' => 'Successfully created team',
                'data' => $team
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed to create team',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        try {
            return response()->json([
                'message' => 'Successfully fetched team : ' . $team->name,
                'data' => $team
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed to fetch team',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string',
                'position' => 'required|string'
            ]);
            $team->update($data);

            return response()->json([
                'message' => 'Successfully updated team ' . $team->name,
                'data' => $team,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed to update team',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        try {
            $team->delete();
            return response()->json([
                'message' => 'Successfully deleted team ' . $team->name,
                'data' => $team
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed to delete team',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
