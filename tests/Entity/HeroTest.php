<?php


namespace App\Tests\Entity;

use App\Entity\Beast;
use App\Entity\Hero;
use PHPUnit\Framework\TestCase;

class HeroTest extends TestCase
{

    public function testMagicShield ()
    {
        $hero = new Hero('nume');
        $damage = 23;
        $health = $hero->getHealth() - $damage;
        $hero->magicShield($damage * 2);
        $this->assertEquals($health, $hero->getHealth());
    }

    public function testRapidStrike ()
    {
        $hero = new Hero('nume');
        $beast = new Beast('bestie');
        $hero->setStrength($beast->getDefence() + 1);
        $health = $beast->getHealth() - 2;
        $hero->rapidStrike($beast);
        $this->assertEquals($health, $beast->getHealth());
    }

    public function testAttack ()
    {
        $hero = new Hero('nume');
        $beast = new Beast('bestie');
        $hero->setStrength($beast->getDefence() + 1);
        $health = $beast->getHealth();
        $hero->attack($beast);
        $this->assertTrue((($beast->getHealth() + 1 == $health) || ($beast->getHealth() + 2 == $health)));
    }

    public function testDefend ()
    {
        $hero = new Hero('nume');
        $health = $hero->getHealth();
        $hero->defend(20);
        $this->assertTrue((($hero->getHealth() + 10 == $health) || ($hero->getHealth() + 20 == $health)));
    }
}
