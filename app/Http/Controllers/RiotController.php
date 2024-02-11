<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RiotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    public function searchPlayer(Request $request)
    {
        $this->validate($request, [
            'namePlayer' => 'required|string',
        ]);
    
        $namePlayer = $request->input('namePlayer');
        $apiKey = config('services.riot.api_key');
    
        // Obtendo informações básicas do jogador
        $responsePlayer = Http::get("https://br1.api.riotgames.com/lol/summoner/v4/summoners/by-name/{$namePlayer}?api_key={$apiKey}");
        $playerData = $responsePlayer->json();

        // Obtendo informações de maestria do jogador
        $responseTopMasteries = Http::get("https://br1.api.riotgames.com/lol/champion-mastery/v4/champion-masteries/by-puuid/{$playerData['puuid']}/top?api_key={$apiKey}");
        $masteries = $responseTopMasteries->json();
        
        // Obtendo informações sobre a liga/challenger do jogador com base no encryptedSummonerId
        $responseLeague = Http::get("https://br1.api.riotgames.com/lol/league/v4/entries/by-summoner/{$playerData['id']}?api_key={$apiKey}");
        $leagueData = $responseLeague->json();

        // Obtendo IDs das partidas do jogador
        $responseMatchIds = Http::get("https://americas.api.riotgames.com/lol/match/v5/matches/by-puuid/{$playerData['puuid']}/ids?api_key={$apiKey}");
        $matchIds = $responseMatchIds->json();
        
        // Obtendo detalhes das partidas
        $matchDetails = [];
        foreach ($matchIds as $matchId) {
            $responseMatch = Http::get("https://americas.api.riotgames.com/lol/match/v5/matches/{$matchId}?api_key={$apiKey}");
            $matchDetails[] = $responseMatch->json();
        }

        dd($matchDetails);
        return view('resultado', compact('playerData', 'masteries', 'matchIds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
