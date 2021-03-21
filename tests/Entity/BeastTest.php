<?php


namespace App\Tests\Entity;

use App\Entity\Beast;
use App\Entity\Hero;
use PHPUnit\Framework\TestCase;

class BeastTest extends TestCase
{
    public function testAttack ()
    {
        $hero = new Hero('nume');
        $beast = new Beast('bestie');
        $beast->setStrength($hero->getDefence() + 1);
        $health = $hero->getHealth();
        $beast->attack($hero);
        $this->assertTrue($hero->getHealth() + 1 == $health);
    }

    public function testDefend ()
    {
        $beast = new Beast('nume');
        $health = $beast->getHealth();
        $beast->defend(20);
        $this->assertTrue($beast->getHealth() + 20 == $health);
    }
}