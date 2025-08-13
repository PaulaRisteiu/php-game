<?php

namespace App\Models;

abstract class Character
{
    protected string $name;
    protected int $health;
    protected int $strength;
    protected int $defence;
    protected int $speed;
    protected float $luck;

    // Getter methods:
    public function getName(): string
    {
        return $this->name;
    }

    public function getHealth(): int
    {
        return $this->health;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function getDefence(): int
    {
        return $this->defence;
    }

    public function getSpeed(): int
    {
        return $this->speed;
    }

    public function getLuck(): float
    {
        return $this->luck;
    }

    // --- SETTERS ---
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setHealth(int $health): void
    {
        $this->health = $health;
    }

    public function setStrength(int $strength): void
    {
        $this->strength = $strength;
    }

    public function setDefence(int $defence): void
    {
        $this->defence = $defence;
    }

    public function setSpeed(int $speed): void
    {
        $this->speed = $speed;
    }

    public function setLuck(float $luck): void
    {
        $this->luck = $luck;
    }


    // --- ACTIONS ---
    public function isLucky(): bool
    {
        return mt_rand(0, 100) / 100 <= $this->luck;
    }

    public function takeDamage(int $damage): void
    {
        $this->health = max(0, $this->health - $damage);
    }

    public function isAlive(): bool
    {
        return $this->health > 0;
    }

    public function isDead(): bool
    {
        return !$this->isAlive();
    }

    public function getSkills(): array
    {
        return [];
    }

}
