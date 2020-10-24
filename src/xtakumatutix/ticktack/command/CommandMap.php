<?php

namespace xtakumatutix\ticktack\command;

use pocketmine\Server;
use xtakumatutix\ticktack\Core;

class CommandMap
{
    const plugin = "TickTackCore";

    public static function registerCommands(Core $core)
    {
        Server::getInstance()->getCommandMap()->register(self::plugin,new shopCommand());
        Server::getInstance()->getCommandMap()->register(self::plugin,new coreCommand());
        Server::getInstance()->getCommandMap()->register(self::plugin,new bisCommand());
        Server::getInstance()->getCommandMap()->register(self::plugin,new tagCommand($core));
    }
}