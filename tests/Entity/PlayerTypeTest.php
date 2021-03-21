<?php


namespace App\Tests\Entity;

use App\Entity\Beast;
use App\Entity\Hero;
use App\Entity\PlayerType;
use PHPUnit\Framework\TestCase;


class PlayerTypeTest extends TestCase
{
    public function testCanCreateHero ()
    {
        $playerMaker = new PlayerType();
        $hero = $playerMaker->createPlayer('hero', 'name');
        $this->assertInstanceOf(Hero::class, $hero);
    }

    public function testCanCreateBeast ()
    {
        $playerMaker = new PlayerType();
        $beast = $playerMaker->createPlayer('beast', 'name');
        $this->assertInstanceOf(Beast::class, $beast);
    }
}