<?php


namespace App\Entity;


use PhpParser\Node\Stmt\Echo_;

class Battleground
{
    private PlayerBase $player1;
    private PlayerBase $player2;
    private int $numberOfRounds = 20;
    private $turns = [ "player1" => 0, "player2" => 0 ];

    /**
     * Battleground constructor.
     * @param PlayerBase $hero
     * @param PlayerBase $beast
     */
    public function __construct (PlayerBase $hero, PlayerBase $beast)
    {
        $this->setPlayer1($hero);
        $this->setPlayer2($beast);
    }

    /**
     * @return mixed
     */
    public function getPlayer1 ()
    {
        return $this->player1;
    }

    /**
     * @param mixed $player1
     */
    public function setPlayer1 ($player1): void
    {
        $this->player1 = $player1;
    }

    /**
     * @return mixed
     */
    public function getPlayer2 ()
    {
        return $this->player2;
    }

    /**
     * @param mixed $player2
     */
    public function setPlayer2 ($player2): void
    {
        $this->player2 = $player2;
    }

    /**
     * @return int
     */
    public function getNumberOfRounds (): int
    {
        return $this->numberOfRounds;
    }

    /**
     * @param int $numberOfRounds
     */
    public function setNumberOfRounds (int $numberOfRounds): void
    {
        $this->numberOfRounds = $numberOfRounds;
    }

    /**
     * @return array
     */
    public function getTurns (): array
    {
        return $this->turns;
    }

    public function setPlayerTurn (string $player)
    {

        $this->turns[$player] = 1;
        if ( $player == 'player2' ) {
            $this->turns['player1'] = 0;
        } else {
            $this->turns['player2'] = 0;
        }

    }

    public function isPlayerTurn ($player): bool
    {
        return $this->turns[$player] == 1;
    }

    public function battle ()
    {
        $iterator = 0;
        while ($iterator < $this->getNumberOfRounds()) {
            if ( $this->isPlayerTurn('player1') ) {
                $this->getPlayer1()->attack($this->getPlayer2());
                if ( $this->getPlayer2()->diesInBattle() ) {
                    echo $this->getPlayer1()->getName() . " wins" . PHP_EOL;
                    break;
                }
                $this->setPlayerTurn('player2');
            } else {
                $this->getPlayer2()->attack($this->getPlayer1());
                if ( $this->getPlayer1()->diesInBattle() ) {
                    echo $this->getPlayer2()->getName() . " wins" . PHP_EOL;
                    break;
                }
                $this->setPlayerTurn("player1");
            }
            echo "\n";
            $iterator++;
        }
    }

    public function setFirstAttacker ()
    {

        if ( $this->getPlayer1()->getSpeed() > $this->getPlayer2()->getSpeed() ) {
            echo $this->getPlayer1()->getName() . " will begin the battle" . PHP_EOL;
            $this->setPlayerTurn('player1');
        } else if ( $this->getPlayer1()->getSpeed() < $this->getPlayer2()->getSpeed() ) {
            echo $this->getPlayer2()->getName() . " will begin the battle" . PHP_EOL;
            $this->setPlayerTurn('player2');
        } else {
            if ( $this->getPlayer1()->getLuck() > $this->getPlayer2()->getLuck() ) {
                echo $this->getPlayer1()->getName() . " will begin the battle" . PHP_EOL;
                $this->setPlayerTurn('player1');
            } else {
                echo $this->getPlayer2()->getName() . " will begin the battle" . PHP_EOL;
                $this->setPlayerTurn('player2');
            }
        }
    }
}