<?php


namespace App\Tests\Entity;

use App\Entity\Beast;
use App\Entity\Hero;
use PHPUnit\Framework\TestCase;

class BeastTest extends TestCase
{
    /**
     * @var Beast
     */
    public Beast $beast;

    protected function setUp (): void
    {
        parent::setUp();
        $this->beast = new Beast('bestie');
    }

    public function testAttack ()
    {
        $hero = new Hero('nume');
        $this->beast->setStrength($hero->getDefence() + 1);
        $health = $hero->getHealth();
        $this->beast->attack($hero);
        $this->assertTrue($hero->getHealth() + 1 == $health);
    }

    public function testDefend ()
    {
        $health = $this->beast->getHealth();
        $this->beast->defend(20);
        $this->assertTrue($this->beast->getHealth() + 20 == $health);
    }
}