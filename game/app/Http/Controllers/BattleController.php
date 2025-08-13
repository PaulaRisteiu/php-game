<?php

namespace App\Http\Controllers;

use App\Services\BattleService;
use Illuminate\Http\Request;

class BattleController extends Controller
{
    protected BattleService $battleService;

    public function __construct(BattleService $battleService)
    {
        $this->battleService = $battleService;
    }
    /**
     * Returnează datele inițiale pentru luptă (GET /battle)
     */
    public function index()
    {
        // Poți alege un hero și monster default sau random
        $hero = Hero::first();
        $monster = Monster::first();

        return response()->json([
            'data' => [
                'hero' => $hero,
                'monster' => $monster,
                'rounds' => []
            ]
        ]);
    }

    /**
     * Pornește lupta și returnează rezultatele (POST /battle/fight)
     */
    public function fight(Request $request)
    {
        $request->validate([
            'hero_id' => 'required|integer|exists:heroes,id',
            'monster_id' => 'required|integer|exists:monsters,id',
        ]);

        // Încarcă eroul și monstrul selectat
        $this->battleService->loadCharacters($request->hero_id, $request->monster_id);

        // Pornește lupta
        $result = $this->battleService->startBattle();

        // Structurează răspunsul pentru frontend
        $response = [
            'data' => [
                'hero' => [
                    'name' => $result['hero']['name'],
                    'health' => $result['hero']['health'],
                ],
                'monster' => [
                    'name' => $result['monster']['name'],
                    'health' => $result['monster']['health'],
                ],
                'rounds' => $result['rounds'], // aici sunt toate detaliile pentru fiecare rundă
                'winner' => $result['winner'], // numele câștigătorului
            ]
        ];

        return response()->json($response);
    }

}
