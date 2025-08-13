<?php

namespace App\Skills;

use App\Models\Character;

class RapidFire implements Skill
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
        // Strike twice, so damage doubles
        return $damage * 2;
    }

    public function getName(): string
    {
        return 'Rapid Fire';
    }
}
