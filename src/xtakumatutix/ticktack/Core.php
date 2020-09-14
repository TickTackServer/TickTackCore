<?php

namespace xtakumatutix\ticktack;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use xtakumatutix\ticktack\command\CommandMap;
use xtakumatutix\ticktack\event\EventManager;

class Core extends PluginBase
{
    public function onEnable()
    {
        EventManager::registerEvents($this);
        CommandMap::registerCommands();
        Server::getInstance()->getNetWork()->setName('§bTick §bTack§e!!§r');
        $this->getLogger()->notice("
 _______  _        _     _______               _\n
|__   __|(_)      | |   |__   __|             | |\n
   | |    _   ___ | | __   | |     __ _   ___ | | __\n
   | |   | | / __|| |/ /   | |    / _` | / __|| |/ /\n
   | |   | || (__ |   <    | |   | (_| || (__ |   <\n
   |_|   |_| \___||_|\_\   |_|    \__,_| \___||_|\_\nHelloWorld...
   ");
    }
}