<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\MonsterController;
use App\Http\Controllers\BattleController;

Route::get('/testweb', function () {
    return 'Test Web route works!';
});


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
