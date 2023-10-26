<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:3',
            'details' => 'nullable',
        ]);

        $request->user()->boards()->create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(Board $board)
    {
        return $board;
    }

    public function update(Request $request, Board $board)
    {
        $validated = $request->validate([
            'title' => 'nullable|min:3',
            'details' => 'nullable',
        ]);

        $board->update($validated);

        return $board;
    }

    public function destroy(string $id)
    {
        //
    }
}
