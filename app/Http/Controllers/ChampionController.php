<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Champion;
use App\Models\ChampionImage;
use Illuminate\Support\Facades\Storage;

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
        $champion->color_1 = $request->color_1;
        $champion->color_2 = $request->color_2;
        $champion->color_3 = $request->color_3;
        $champion->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');

                $championImage = new ChampionImage();
                $championImage->champion_id = $champion->id;
                $championImage->image_path = $path;
                $championImage->save();
            }
        }

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
        $champion->color_1 = $request->color_1;
        $champion->color_2 = $request->color_2;
        $champion->color_3 = $request->color_3;
        $champion->save();

        if ($request->hasFile('images')) {
            foreach ($champion->images as $image) {
                Storage::delete('public/' . $image->image_path);
                $image->delete();
            }

            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');

                $championImage = new ChampionImage();
                $championImage->champion_id = $champion->id;
                $championImage->image_path = $path;
                $championImage->save();
            }
        }

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
