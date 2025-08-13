<?php

namespace App\Skills;

use App\Models\Character;

class MagicArmour implements Skill
{
    protected float $chance;

    public function __construct(float $chance = 0.15)
    {
        $this->chance = $chance;
    }

    public function shouldActivate(): bool
    {
        return mt_rand(1, 100) <= $this->chance * 100;
    }

    public function apply(Character $attacker, Character $defender, int $damage): int
    {
        // Reduces damage to half
        return (int) round($damage / 2);
    }

    public function getName(): string
    {
        return 'Magic Armour';
    }
}
