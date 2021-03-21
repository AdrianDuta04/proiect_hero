<?php


namespace App\Tests\Entity;

use App\Entity\Battleground;
use App\Entity\Beast;
use App\Entity\Hero;
use PHPUnit\Framework\TestCase;

class BattlegroundTest extends TestCase
{
    public function testSetPlayer ()
    {
        $battleGround = new BattleGround(new Hero('nume'), new Beast('Nume'));
        $hero = new Hero('nume2');
        $battleGround->setPlayer1($hero);
        $this->assertSame($hero, $battleGround->getPlayer1());
    }

    public function testSetTurn ()
    {
        $battleGround = new BattleGround(new Hero('nume'), new Beast('Nume'));
        $battleGround->setPlayerTurn("player1");
        $turns = $battleGround->getTurns();
        $this->assertEquals(1, $turns['player1']);
    }

    public function testIsPlayerTurn ()
    {
        $battleGround = new BattleGround(new Hero('nume'), new Beast('Nume'));
        $battleGround->setPlayerTurn("player1");
        $this->assertTrue($battleGround->isPlayerTurn('player1'));

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


}