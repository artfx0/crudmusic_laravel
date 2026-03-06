<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    // Show all music
    public function index()
    {
        $music = Music::latest()->get();
        return view('music.index', compact('music'));
    }

    // Show form to create new music
    public function create()
    {
        return view('music.create');
    }

    // Save new music to database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
        ]);

        Music::create($request->all());

        return redirect()->route('music.index')
            ->with('success', 'Music created successfully');
    }

    // Show single music item
    public function show(Music $music)
    {
        return view('music.show', compact('music'));
    }

    // Show form to edit music
    public function edit(Music $music)
    {
        return view('music.edit', compact('music'));
    }

    // Update music in database
    public function update(Request $request, Music $music)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
        ]);

        $music->update($request->all());

        return redirect()->route('music.index')
            ->with('success', 'Music updated successfully');
    }

    // Delete music from database
    public function destroy(Music $music)
    {
        $music->delete();

        return redirect()->route('music.index')
            ->with('success', 'Music deleted successfully');
    }
}