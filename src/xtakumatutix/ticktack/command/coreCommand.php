<?php

namespace xtakumatutix\ticktack\Command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class coreCommand extends Command
{
    public function __construct()
    {
        parent::__construct("core", "TickTackCoreについて", "/core");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        $sender->sendMessage('TickTackCore β');
        $sender->sendMessage('CodeName > marshmallow');
        $sender->sendMessage('license > MIT');
        $sender->sendMessage('Github > https://github.com/TickTackServer');
        return true;
    }
}