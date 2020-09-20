<?php

namespace xtakumatutix\ticktack\command;

use pocketmine\Server;
use xtakumatutix\ticktack\Core;

class CommandMap
{
    const plugin = "TickTackCore";

    public static function registerCommands()
    {
        Server::getInstance()->getCommandMap()->register(self::plugin,new shopCommand());
    }
}