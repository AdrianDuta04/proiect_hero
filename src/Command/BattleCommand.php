<?php

namespace App\Command;

use App\Entity\Battleground;
use App\Entity\PlayerFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class BattleCommand extends Command
{
    protected static $defaultName = "app:initiate-battle";

    protected function configure ()
    {
        $this->setDescription("A greate battle begins in the forest of Emagia");
        $this->setHelp("This command initializes the battle between Orderus and the beast");
        parent::configure();
    }

    public function execute (InputInterface $input, OutputInterface $output): int
    {
        $playerMaker = new PlayerFactory();
        try {
            $Orderus = $playerMaker->createPlayer("hero", "Orderus", [ "magicShield" => 1, "rapidStrike" => 1 ]);
            $BeastOfEmagia = $playerMaker->createPlayer("beast", "BeastOfEmagia");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        $emagia = new Battleground($Orderus, $BeastOfEmagia, 20);
        $emagia->battle();
        return Command::SUCCESS;
    }
}