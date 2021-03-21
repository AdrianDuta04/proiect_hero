<?php


namespace App\Entity;


class PlayerType
{

    public function createPlayer ($type, $name): PlayerBase
    {
        if ( $type == "hero" )
            return new Hero($name);
        else if ( $type == "beast" )
            return new Beast($name);
    }
}