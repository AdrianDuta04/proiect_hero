<?php declare(strict_types=1);


namespace App\Entity;


class PlayerFactory
{

    public function createPlayer (string $type, PlayerBase $name): PlayerBase
    {
        if ( $type == "hero" ) {
            return new Hero($name);
        } else if ( $type == "beast" ) {
            return new Beast($name);
        }

        // else throw exceptie
    }
}