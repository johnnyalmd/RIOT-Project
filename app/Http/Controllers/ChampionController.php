<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Champion;

class ChampionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $champions = Champion::all();
        return view('champions.index', ['champions' => $champions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('champions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $champion = new Champion();
        $champion->name = $request->name;
        $champion->id_custom = $request->id_custom;
        $champion->description = $request->description;
        $champion->lore = $request->lore;
        $champion->save();

        return redirect()->route('champions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $champion = Champion::find($id);
        return view('champions.edit', ['champion' => $champion]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $champion = Champion::find($id);
        $champion->name = $request->name;
        $champion->id_custom = $request->id_custom;
        $champion->description = $request->description;
        $champion->lore = $request->lore;
        $champion->save();

        return redirect()->route('champions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $champion = Champion::find($id);
        $champion->delete();

        return redirect()->route('champions.index');
    }
}
