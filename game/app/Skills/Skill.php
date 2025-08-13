<?php

namespace App\Skills;

use App\Models\Character;

interface Skill
{
    public function shouldActivate(): bool;

    public function apply(Character $attacker, Character $defender, int $damage): int;

    public function getName(): string;

}
