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
        $this->hero = new Hero('nume', [ "magicShield" => 1, "rapidStrike" => 1 ]);
    }

    public function testHeroUsesMagicShield ()
    {
        $damage = 46;
        $health = $this->hero->getHealth() - $damage / 2;
        $this->hero->magicShield($damage);
        $this->assertEquals($health, $this->hero->getHealth());//whe the hero uses magic shield he recieves just half of the damage
    }

    public function testRapidStrike ()
    {
        $beast = new Beast('bestie');
        $this->hero->setStrength($beast->getDefence() + 1);//setting a low strength to be sure the beast is not dad after one strike
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
        $this->assertTrue((($beast->getHealth() + 1 == $health) || ($beast->getHealth() + 2 == $health)));// on the attack method the hero can use both simple attack and rapid strike
    }

    public function testDefend ()
    {
        $health = $this->hero->getHealth();
        $this->hero->defend(20);
        $this->assertTrue((($this->hero->getHealth() + 10 == $health) || ($this->hero->getHealth() + 20 == $health)));//on defend the hero can use magic shield and receive less damage or use no ability and recieve full famage
    }
}
