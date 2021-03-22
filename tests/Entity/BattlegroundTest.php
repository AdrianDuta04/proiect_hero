<?php


namespace App\Tests\Entity;

use App\Entity\Battleground;
use App\Entity\Beast;
use App\Entity\Hero;
use PHPUnit\Framework\TestCase;

class BattlegroundTest extends TestCase
{
    /**
     * @var Battleground
     */
    public Battleground $battleGround;

    protected function setUp (): void
    {
        parent::setUp();
        $this->battleGround = new BattleGround(new Hero('nume'), new Beast('Nume'));
    }

    public function testSetTurn ()
    {
        $this->battleGround->setPlayerTurn("player1");
        $turns = $this->battleGround->getTurns();
        $this->assertEquals(1, $turns['player1']);
    }

    public function testIsPlayerTurn ()
    {
        $this->battleGround->setPlayerTurn("player1");
        $this->assertTrue($this->battleGround->isPlayerTurn('player1'));
    }

    public function testSetFirstAttackerBasedOnSpeed ()
    {
        $hero = new Hero('nume2');
        $hero->setSpeed(99);
        $beast = new Beast('bestie');
        $beast->setSpeed(0);
        $battle = new BattleGround($hero, $beast);
        $battle->setFirstAttacker();
        $this->assertTrue($battle->isPlayerTurn('player1'));
    }

    public function testSetFirstAttackerBasedOnLuck ()
    {
        $hero = new Hero('nume2');
        $hero->setSpeed(99);
        $hero->setLuck(40);
        $beast = new Beast('bestie');
        $beast->setSpeed(99);
        $beast->setLuck(90);
        $battle = new BattleGround($hero, $beast);
        $battle->setFirstAttacker();
        $this->assertTrue($battle->isPlayerTurn('player2'));
    }
    //adauga teste battle -> castiga player 1 , castiga player2 , egal
}