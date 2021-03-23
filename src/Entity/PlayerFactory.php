<?php declare(strict_types=1);


namespace App\Entity;


use Exception;

class PlayerFactory
{

    public function createPlayer (string $type, string $name, array $abilities = []): PlayerBase
    {

        if ( $type == "hero" ) {
            return new Hero($name, $abilities);
        } else if ( $type == "beast" ) {
            return new Beast($name);
        } else throw new Exception("Invalid Player Format");


        // else throw exceptie
    }
}