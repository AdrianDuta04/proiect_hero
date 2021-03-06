<?php


namespace App\Entity;


abstract class PlayerBase
{
    protected int $maxHealth = 0;
    protected int $maxStrength = 0;
    protected int $maxDefence = 0;
    protected int $maxSpeed = 0;
    protected int $maxLuck = 0;

    protected int $minHealth = 0;
    protected int $minStrength = 0;
    protected int $minDefence = 0;
    protected int $minSpeed = 0;
    protected int $minLuck = 0;

    protected int $health;
    protected int $strength;
    protected int $defence;
    protected int $speed;
    protected int $luck;
    protected string $name;

    abstract public function attack (PlayerBase $player);

    abstract public function defend (int $damage);

    public function __construct ()
    {
        $this->health = (rand($this->getMinHealth(), $this->getMaxHealth()));
        $this->strength = (rand($this->getMinStrength(), $this->getMaxStrength()));
        $this->defence = (rand($this->getMinDefence(), $this->getMaxDefence()));
        $this->speed = (rand($this->getMinSpeed(), $this->getMaxSpeed()));
        $this->luck = (rand($this->getMinLuck(), $this->getMaxLuck()));
    }

    /**
     * @return int
     */
    public function getMaxHealth (): int
    {
        return $this->maxHealth;
    }

    /**
     * @return int
     */
    public function getMaxStrength (): int
    {
        return $this->maxStrength;
    }

    /**
     * @return int
     */
    public function getMaxDefence (): int
    {
        return $this->maxDefence;
    }

    /**
     * @return int
     */
    public function getMaxSpeed (): int
    {
        return $this->maxSpeed;
    }

    /**
     * @return int
     */
    public function getMaxLuck (): int
    {
        return $this->maxLuck;
    }

    /**
     * @return int
     */
    public function getMinHealth (): int
    {
        return $this->minHealth;
    }

    /**
     * @return int
     */
    public function getMinStrength (): int
    {
        return $this->minStrength;
    }

    /**
     * @return int
     */
    public function getMinDefence (): int
    {
        return $this->minDefence;
    }

    /**
     * @return int
     */
    public function getMinSpeed (): int
    {
        return $this->minSpeed;
    }

    /**
     * @return int
     */
    public function getMinLuck (): int
    {
        return $this->minLuck;
    }

    /**
     * @return int
     */
    public function getHealth (): int
    {
        return $this->health;
    }

    /**
     * @return int
     */
    public function getStrength (): int
    {
        return $this->strength;
    }

    /**
     * @return int
     */
    public function getDefence (): int
    {
        return $this->defence;
    }

    /**
     * @return int
     */
    public function getSpeed (): int
    {
        return $this->speed;
    }

    /**
     * @return int
     */
    public function getLuck (): int
    {
        return $this->luck;
    }

    /**
     * @param int $health
     */
    public function setHealth (int $health): void
    {
        $this->health = $health;
    }

    /**
     * @param int $strength
     */
    public function setStrength (int $strength): void
    {
        $this->strength = $strength;
    }

    /**
     * @param int $defence
     */
    public function setDefence (int $defence): void
    {
        $this->defence = $defence;
    }

    /**
     * @param int $speed
     */
    public function setSpeed (int $speed): void
    {
        $this->speed = $speed;
    }

    /**
     * @param int $luck
     */
    public function setLuck (int $luck): void
    {
        $this->luck = $luck;
    }

    /**
     * @return string
     */
    public function getName (): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName (string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param int $defence
     * @return int
     */
    public function calculateDamage (int $defence): int
    {
        return $this->getStrength() - $defence;
    }

    public function diesInBattle (): bool
    {
        return $this->getHealth() <= 0;
    }

    /**
     * @param int $damage
     */
    public function receiveDamage (int $damage): void
    {
        $this->setHealth($this->getHealth() - $damage);
    }

}