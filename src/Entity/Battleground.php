<?php


namespace App\Entity;



class Battleground
{
    private PlayerBase $player1;
    private PlayerBase $player2;
    private int $numberOfRounds = 20;
    protected PlayerBase $winner;
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
    public function getPlayer2 (): PlayerBase
    {
        return $this->player2;
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

    public function battle ()
    {
        $this->setFirstAttacker();
        $iterator = 0;
        while ($iterator < $this->numberOfRounds) {
            if ( $this->isPlayerTurn('player1') ) {
                $this->player1->attack($this->player2);
                if ( $this->player2->diesInBattle() ) {
                    echo $this->player1->getName() . " wins" . PHP_EOL;
                    $this->winner = $this->player1;
                    break;
                }
                $this->setPlayerTurn('player2');
            } else {
                $this->player2->attack($this->player1);
                if ( $this->player1->diesInBattle() ) {
                    echo $this->player2->getName() . " wins" . PHP_EOL;
                    $this->winner = $this->player1;
                    break;
                }
                $this->setPlayerTurn("player1");
            }
            echo "\n";
            $iterator++;
        }
        if ( !$this->player1->diesInBattle() && !$this->player2->diesInBattle() )
            echo "It's a tie";
    }

    /**
     * @return PlayerBase
     */
    public function getWinner (): PlayerBase
    {
        return $this->winner;
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