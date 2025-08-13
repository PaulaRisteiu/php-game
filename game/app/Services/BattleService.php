<?php

namespace App\Services;

use App\Models\Hero;
use App\Models\Monster;
use App\Skills\MagicArmour;
use App\Skills\RapidFire;
use App\Models\Character;

class BattleService
{
    protected Hero $hero;
    protected Monster $monster;
    protected array $logs = [];

    public function loadCharacters(int $heroId, int $monsterId): bool
    {
        $this->hero = $this->findHeroById($heroId);
        if (!$this->hero) {
            return false; // sau aruncă o excepție custom dacă vrei
        }

        $this->monster = $this->findMonsterById($monsterId);
        if (!$this->monster) {
            return false;
        }

        return true;
    }

    // Funții de “find” manual
    private function findHeroById(int $id): ?Hero
    {
        // exemplu cu array static
        $heroes = [
            1 => new Hero('Erou1', 100, 20, 10),
            2 => new Hero('Erou2', 80, 25, 5),
        ];

        return $heroes[$id] ?? null;
    }

    private function findMonsterById(int $id): ?Monster
    {
        $monsters = [
            1 => new Monster('Monstru1', 90, 15, 5),
            2 => new Monster('Monstru2', 120, 10, 8),
        ];

        return $monsters[$id] ?? null;
    }

    public function startBattle(): array
    {
        $this->logs = [];
        $attacker = $this->determineFirstAttacker();
        $defender = $attacker === $this->hero ? $this->monster : $this->hero;

        $round = 1;
        while ($this->hero->getHealth() > 0 && $this->monster->getHealth() > 0 && $round <= 15) {
            // Atacul atacatorului
            if ($defender->isLucky()) {
                $this->logs[] = "Runda {$round}: {$defender->getType()}-ul {$defender->getName()} a fost norocos și a evitat atacul!";
            } else {
                $damage = max(0, $attacker->getStrength() - $defender->getDefence());
                $usedSkills = [];

                // Skill-uri atacator
                foreach ($attacker->getSkills() as $skill) {
                    if ($skill->shouldActivate()) {
                        $damage = $skill->apply($attacker, $defender, $damage);
                        $usedSkills[] = $skill->getName();
                        $this->logs[] = "Skill-ul {$skill->getName()} a activat!";
                    }
                }

                // Skill-uri apărător (MagicArmour)
                foreach ($defender->getSkills() as $skill) {
                    if ($skill instanceof MagicArmour && $skill->shouldActivate()) {
                        $damage = $skill->apply($attacker, $defender, $damage);
                        $usedSkills[] = $skill->getName();
                        $this->logs[] = "Skill-ul {$skill->getName()} a activat!";
                    }
                }

                $defender->takeDamage($damage);

                $this->logs[] = "Runda {$round}: {$attacker->getType()}-ul {$attacker->getName()} lovește {$defender->getType()}-ul {$defender->getName()} cu {$damage} damage. HP-ul {$defender->getType()}-ului: {$defender->getHealth()}";

                if (!empty($usedSkills)) {
                    $this->logs[] = "💡 Skill-uri folosite: " . implode(', ', $usedSkills);
                }
            }

            // Verifică dacă defender-ul a murit
            if ($defender->isDead()) {
                $this->logs[] = "🏆 {$attacker->getType()}-ul {$attacker->getName()} câștigă lupta!";
                break;
            }

            $this->switchRoles($attacker, $defender);
            $round++;
        }

        if (!$this->hero->isDead() && !$this->monster->isDead()) {
            $this->logs[] = "⚖️ Egalitate după 15 runde!";
        }

        return $this->getBattleResult();
    }
    public function getBattleResult(): array
    {
        $winner = null;
        if ($this->hero->isDead()) $winner = $this->monster->getName();
        elseif ($this->monster->isDead()) $winner = $this->hero->getName();

        return [
            'rounds' => $this->logs,
            'hero' => [
                'name' => $this->hero->getName(),
                'health' => $this->hero->getHealth(),
            ],
            'monster' => [
                'name' => $this->monster->getName(),
                'health' => $this->monster->getHealth(),
            ],
            'winner' => $winner,
        ];
    }

    private function determineFirstAttacker()
    {
        if ($this->hero->getSpeed() > $this->monster->getSpeed()) {
            return $this->hero;
        } elseif ($this->hero->getSpeed() < $this->monster->getSpeed()) {
            return $this->monster;
        } else {
            return $this->hero->getLuck() >= $this->monster->getLuck() ? $this->hero : $this->monster;
        }
    }

    private function switchRoles(&$attacker, &$defender): void
    {
        [$attacker, $defender] = [$defender, $attacker];
    }
}
