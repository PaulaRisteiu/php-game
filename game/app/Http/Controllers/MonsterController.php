<?php

namespace App\Http\Controllers;

use App\Models\Monster;
use Illuminate\Http\JsonResponse;

class MonsterController extends Controller
{
    public function show(): JsonResponse
    {
        try {
            $monster = new Monster();

            return $this->respondSuccess([
                'name' => $monster->getName(),
                'health' => $monster->getHealth(),
                'strength' => $monster->getStrength(),
                'defence' => $monster->getDefence(),
                'speed' => $monster->getSpeed(),
                'luck' => $monster->getLuck(),
            ], 'Monster loaded successfully');
        } catch (\Exception $e) {
            return $this->respondError('Failed to load monster', 500, [
                'exception' => $e->getMessage()
            ]);
        }
    }
}
