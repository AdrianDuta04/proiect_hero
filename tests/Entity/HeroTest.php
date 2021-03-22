<?php


namespace App\Tests\Entity;

use App\Entity\Beast;
use App\Entity\Hero;
use PHPUnit\Framework\TestCase;

class HeroTest extends TestCase
{
    /**
     * @var Hero
     */
    public Hero $hero;

    protected function setUp (): void
    {
        parent::setUp();
        $this->hero = new Hero('nume');
    }

    public function testMagicShield ()//schimba nume
    {
        $damage = 46;
        $health = $this->hero->getHealth() - $damage / 2;
        $this->hero->magicShield($damage);
        $this->assertEquals($health, $this->hero->getHealth());
    }

    public function testRapidStrike ()
    {
        $beast = new Beast('bestie');
//        $damage = $this->hero->calculateDamage($beast->getDefence());
        $this->hero->setStrength($beast->getDefence() + 1);
        $health = $beast->getHealth() - 2;
        $this->hero->rapidStrike($beast);
        $this->assertEquals($health, $beast->getHealth());
    }

    public function testAttack ()
    {
        $beast = new Beast('bestie');
        $this->hero->setStrength($beast->getDefence() + 1);
        $health = $beast->getHealth();
        $this->hero->attack($beast);
        $this->assertTrue((($beast->getHealth() + 1 == $health) || ($beast->getHealth() + 2 == $health)));
    }

    public function testDefend ()
    {
        $health = $this->hero->getHealth();
        $this->hero->defend(20);
        $this->assertTrue((($this->hero->getHealth() + 10 == $health) || ($this->hero->getHealth() + 20 == $health)));
    }
}
