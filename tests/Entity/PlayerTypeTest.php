<?php


namespace App\Tests\Entity;

use App\Entity\Beast;
use App\Entity\Hero;
use App\Entity\PlayerType;
use PHPUnit\Framework\TestCase;


class PlayerTypeTest extends TestCase
{
    /**
     * @var PlayerType
     */
    public PlayerType $playerMaker;

    protected function setUp (): void
    {
        parent::setUp();
        $this->playerMaker = new PlayerType();
    }

    public function testCanCreateHero ()
    {
        $hero = $this->playerMaker->createPlayer('hero', 'name');
        $this->assertInstanceOf(Hero::class, $hero);
    }

    public function testCanCreateBeast ()
    {
        $beast = $this->playerMaker->createPlayer('beast', 'name');
        $this->assertInstanceOf(Beast::class, $beast);
    }
}