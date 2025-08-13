<?php

namespace App\Models;

use App\Models\Character;
use App\Skills\RapidFire;
use App\Skills\MagicArmour;

class Hero extends Character
{
    protected array $skills = [];

    public function __construct()
    {
//        parent::__construct();

        $this->setName('Kratos');
        $this->setHealth(rand(65, 100));
        $this->setStrength(rand(75, 90));
        $this->setDefence(rand(40, 50));
        $this->setSpeed(rand(40, 50));
        $this->setLuck(rand(10, 20) / 100);

        // Adăugăm skill-urile la inițializare
        $this->addSkill(new RapidFire(0.15));   // 15% șansă
        $this->addSkill(new MagicArmour(0.15)); // 15% șansă
    }

    public function addSkill($skill): void
    {
        $this->skills[] = $skill;
    }

    public function getSkills(): array
    {
        return $this->skills;
    }

    public function getType(): string
    {
        return "Hero";
    }

}
