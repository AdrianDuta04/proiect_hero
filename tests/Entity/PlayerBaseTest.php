<?php


namespace App\Tests\Entity;


use App\Entity\PlayerBase;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class PlayerBaseTest extends TestCase
{
    /**
     * @var PlayerBase|MockObject
     */
    public $player;

    protected function setUp (): void
    {
        parent::setUp();
        $this->player = $this->getMockForAbstractClass(PlayerBase::class);
    }

    public function testCalculateDamage ()
    {
        $defence = 5;
        $this->assertEquals($this->player->getStrength() - $defence, $this->player->calculateDamage($defence));
    }

    public function testDiesInBattle ()
    {
        $this->player->setHealth(-2);
        $this->assertTrue($this->player->diesInBattle());
    }

    public function testReceiveDamage ()
    {

        $damage = 23;
        $health = $this->player->getHealth() - $damage;
        $this->player->receiveDamage($damage);
        $this->assertEquals($health, $this->player->getHealth());
    }
}