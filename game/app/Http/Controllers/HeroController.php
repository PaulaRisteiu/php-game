<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\JsonResponse;

class HeroController extends Controller
{
    public function show(): JsonResponse
    {
        try {
            $hero = new Hero();

            return $this->respondSuccess([
                'name' => $hero->getName(),
                'health' => $hero->getHealth(),
                'strength' => $hero->getStrength(),
                'defence' => $hero->getDefence(),
                'speed' => $hero->getSpeed(),
                'luck' => $hero->getLuck(),
                'skills' => array_map(
                    fn($skill) => $skill->getName(),
                    $hero->getSkills()
                ),
            ], 'Hero loaded successfully');
        } catch (\Exception $e) {
            return $this->respondError('Failed to load hero', 500, [
                'exception' => $e->getMessage()
            ]);
        }
    }

    public function index()
    {
        // exemplu: returnează toți eroii în JSON
        $heroes = Hero::all();
        return response()->json($heroes);
    }
}
