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
        $damage = 5;
        $this->assertEquals($this->player->getStrength() - $damage, $this->player->calculateDamage($damage));
    }
}