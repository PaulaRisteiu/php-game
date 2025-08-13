<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Game\Hero;
use App\Models\Game\Monster;
use App\Services\BattleService;
use App\Skills\MagicArmour;
use App\Skills\RapidFire;

class SimulateBattle extends Command
{
    protected $signature = 'battle:simulate';
    protected $description = 'Simulate a battle between Kratos and Wild Monster';

    public function handle(): int
    {
        // Inițializează eroul și monstrul
        $hero = new Hero();
        $hero->setName('Kratos');
        $hero->addSkill(new RapidFire());
        $hero->addSkill(new MagicArmour());

        $monster = new Monster();
        $monster->setName('Wild Monster');

        // start battle
        $battle = new BattleService($hero, $monster);
        $battle->startBattle();

        // Afișează rezultatul în terminal
        foreach ($battle->getLogs() as $log) {
            $this->line($log);
        }

        return 0;
    }
}
