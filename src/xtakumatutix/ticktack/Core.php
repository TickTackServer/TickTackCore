<?php

namespace xtakumatutix\ticktack;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use xtakumatutix\ticktack\command\CommandMap;
use xtakumatutix\ticktack\event\EventManager;
use xtakumatutix\ticktack\task\StatusTask;

class Core extends PluginBase
{
    public function onEnable()
    {
        if ($this->getServer()->getPluginManager()->getPlugin("EconomyAPI") == null){
            $this->getLogger()->warning("EconomyAPIを導入してください。TickTackCoreを停止致します。");
            $this->getServer()->getPluginManager()->disablePlugin($this);
            return true;
        }
        if ($this->getServer()->getPluginManager()->getPlugin("EasyScoreboardAPI") == null){
            $this->getLogger()->warning("EasyScoreboardAPIを導入してください。TickTackCoreを停止致します。");
            $this->getServer()->getPluginManager()->disablePlugin($this);
            return true;
        }
        date_default_timezone_set('Asia/Tokyo');
        EventManager::registerEvents($this);
        CommandMap::registerCommands();
        $this->getScheduler()->scheduleRepeatingTask(new StatusTask($this), 20);
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