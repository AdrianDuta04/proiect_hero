<?php


namespace App\Entity;


use Exception;

class Hero extends PlayerBase
{
    protected int $maxHealth = 100;
    protected int $maxStrength = 80;
    protected int $maxDefence = 55;
    protected int $maxSpeed = 50;
    protected int $maxLuck = 30;

    protected int $minHealth = 70;
    protected int $minStrength = 70;
    protected int $minDefence = 45;
    protected int $minSpeed = 40;
    protected int $minLuck = 10;
    protected array $abilities = [ "magicShield" => 0, "rapidStrike" => 0 ];


    public function __construct ($name = "hero", array $abilities = [ "magicShield" => 0, "rapidStrike" => 0 ])
    {
        echo "A great Hero was created ";
        $this->name = $name;
        echo "His name is " . $this->name . "\n";
        $this->abilities = $abilities;
        parent::__construct();
    }

    public function attack (PlayerBase $player)
    {
        echo "The Hero attacks \n";
        if ( $this->canUseSpecialAttack() ) {
            $this->rapidStrike($player);
        } else $player->defend($this->calculateDamage($player->getDefence()));;
    }

    public function defend (int $damage)
    {
        echo "The Hero was hit \n";
        if ( $this->canUseSpecialDefence() ) {
            $this->magicShield($damage);
        } else $this->receiveDamage($damage);
    }

    public function canUseSpecialAttack (): bool
    {
        return rand(1, 10) == 1 && $this->abilities["rapidStrike"] == 1;
    }

    public function rapidStrike (PlayerBase $player)
    {
        echo "He uses RapidStrike\n";
        $player->defend($this->calculateDamage($player->getDefence()));
        if ( !$player->diesInBattle() )
            $player->defend($this->calculateDamage($player->getDefence()));
    }

    public function canUseSpecialDefence (): bool
    {
        return rand(1, 5) == 1 && $this->abilities["magicShield"] == 1;
    }

    public function magicShield (int $damage)
    {
        echo "He uses MagicShield\n";
        $this->receiveDamage($damage / 2);
    }
}