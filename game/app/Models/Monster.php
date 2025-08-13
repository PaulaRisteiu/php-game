<?php

namespace App\Models;

use App\Models\Character;

class Monster extends Character
{
    public function __construct()
    {
//        parent::__construct();

        $this->setName('Wild Monster');
        $this->setHealth(rand(50, 80));
        $this->setStrength(rand(55, 80));
        $this->setDefence(rand(50, 70));
        $this->setSpeed(rand(40, 60));
        $this->setLuck(rand(30, 45) / 100);
    }

    public function getSkills(): array
    {
        return [];
    }

    public function getType(): string
    {
        return "Monster";
    }

}
