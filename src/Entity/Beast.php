<?php


namespace App\Entity;


class Beast extends PlayerBase
{
    protected int $maxHealth = 90;
    protected int $maxStrength = 90;
    protected int $maxDefence = 60;
    protected int $maxSpeed = 60;
    protected int $maxLuck = 40;

    protected int $minHealth = 60;
    protected int $minStrength = 60;
    protected int $minDefence = 40;
    protected int $minSpeed = 40;
    protected int $minLuck = 25;

    public function __construct ($name = "beast")
    {
        echo "A great Beast was created ";
        $this->setName($name);
        echo "His name is " . $this->name . "\n";
        parent::__construct();
    }

    public function attack (PlayerBase $player)
    {
        echo "The beast attacks\n";
        $player->defend($this->calculateDamage($player->getDefence()));;
    }

    public function defend (int $damage)
    {
        echo "The beast was hit\n";
        $this->receiveDamage($damage);
    }
}