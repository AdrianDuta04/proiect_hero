<?php


namespace App\Entity;



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
     * @param int $numberOfRounds
     */
    public function __construct (PlayerBase $hero, PlayerBase $beast, int $numberOfRounds = 20)
    {
        $this->player1 = ($hero);
        $this->player2 = ($beast);
        $this->numberOfRounds = $numberOfRounds;
    }

    /**
     * @return mixed
     */
    public function getPlayer1 (): PlayerBase
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
    public function getPlayer2 (): PlayerBase
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

    public function setPlayerTurn (string $player)//playername si cand construiesc battleground pun numele in array ca si cheie
    {

        $this->turns[$player] = 1;
        if ( $player == 'player2' ) {
            $this->turns['player1'] = 0;
        } else {
            $this->turns['player2'] = 0;
        }

    }

    public function isPlayerTurn ($player): bool //type
    {
        return $this->turns[$player] == 1;
    }

    public function battle ()//scoate  geter
    {
        $this->setFirstAttacker();
        $iterator = 0;
        while ($iterator < $this->numberOfRounds) {
            if ( $this->isPlayerTurn('player1') ) {
                $this->player1->attack($this->player2);
                if ( $this->player2->diesInBattle() ) {
                    echo $this->player1->getName() . " wins" . PHP_EOL;
                    break;
                }
                $this->setPlayerTurn('player2');
            } else {
                $this->player2->attack($this->player1);
                if ( $this->player1->diesInBattle() ) {
                    echo $this->player2->getName() . " wins" . PHP_EOL;
                    break;
                }
                $this->setPlayerTurn("player1");
            }
            echo "\n";
            $iterator++;//adauga egal
        }
    }

    public function setFirstAttacker (): void
    {
        if ( $this->player1->getSpeed() > $this->player2->getSpeed() ) {
            echo $this->player1->getName() . " will begin the battle" . PHP_EOL;
            $this->setPlayerTurn('player1');
        } else
            if ( $this->player1->getSpeed() < $this->player2->getSpeed() ) {
                echo $this->player2->getName() . " will begin the battle" . PHP_EOL;
                $this->setPlayerTurn('player2');
            } else {
                if ( $this->player1->getLuck() > $this->player2->getLuck() ) {
                    echo $this->player1->getName() . " will begin the battle" . PHP_EOL;
                    $this->setPlayerTurn('player1');
                } else {
                    echo $this->player2->getName() . " will begin the battle" . PHP_EOL;
                    $this->setPlayerTurn('player2');
                }
            }
    }
}