<?php

use App\Http\Controllers\HeroController;
use App\Http\Controllers\MonsterController;
use App\Http\Controllers\BattleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;


Route::get('/test', function () {
    return response()->json(['message' => 'API test works!']);
});

// Heroes
Route::get('/heroes', [HeroController::class, 'index']);    // listă de eroi
Route::get('/hero', [HeroController::class, 'show']);

//Route::post('/hero', [HeroController::class, 'store']);
//Route::put('/hero/{id}', [HeroController::class, 'update']);
//Route::delete('/hero/{id}', [HeroController::class, 'destroy']);

// Monsters
Route::get('/monsters', [MonsterController::class, 'index']);
Route::get('/monster', [MonsterController::class, 'show']);

// Simulează bătălia și returnează rezultatul
Route::get('/battle', [BattleController::class, 'index']);

// API pentru luptă (JSON)
Route::post('/battle/fight', [BattleController::class, 'fight']);

// Skills
//Route::get('/skills', [SkillController::class, 'index']);     // listă de skill-uri
//Route::get('/skill/{id}', [SkillController::class, 'show']);
//Route::post('/skill', [SkillController::class, 'store']);
//Route::put('/skill/{id}', [SkillController::class, 'update']);/
//Route::delete('/skill/{id}', [SkillController::class, 'destroy']);

// Battles
//Route::get('/battles', [BattleController::class, 'index']);
//Route::get('/battle/{id}', [BattleController::class, 'show']);
//Route::post('/battle', [BattleController::class, 'store']);
//Route::put('/battle/{id}', [BattleController::class, 'update']);
//Route::delete('/battle/{id}', [BattleController::class, 'destroy']);

// Rounds
//Route::get('/rounds', [RoundController::class, 'index']);
//Route::get('/round/{id}', [RoundController::class, 'show']);
//Route::post('/round', [RoundController::class, 'store']);
//Route::put('/round/{id}', [RoundController::class, 'update']);
//Route::delete('/round/{id}', [RoundController::class, 'destroy']);
