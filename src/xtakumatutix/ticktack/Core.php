<?php

namespace xtakumatutix\ticktack;

use onebone\economyapi\EconomyAPI;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\Config;
use xtakumatutix\ticktack\command\CommandMap;
use xtakumatutix\ticktack\event\EventManager;
use xtakumatutix\ticktack\task\StatusTask;

class Core extends PluginBase
{
    public function onEnable(): void
    {
        if ($this->getServer()->getPluginManager()->getPlugin("EconomyAPI") == null){
            $this->getLogger()->warning("EconomyAPIを導入してください。TickTackCoreを停止致します。");
            $this->getServer()->getPluginManager()->disablePlugin($this);
            return true;
        }
        date_default_timezone_set('Asia/Tokyo');
        EventManager::registerEvents($this);
        CommandMap::registerCommands($this);
        $this->getScheduler()->scheduleRepeatingTask(new StatusTask($this), 20);
        $this->mode = new Config($this->getDataFolder(). "mode.yml", Config::YAML);
        $this->tag = new Config($this->getDataFolder(). "tag.yml", Config::YAML);
        Server::getInstance()->getNetWork()->setName('§bTick §bTack§e!!§r');
        $this->getLogger()->notice("
 _______  _        _     _______               _
|__   __|(_)      | |   |__   __|             | |
   | |    _   ___ | | __   | |     __ _   ___ | | __
   | |   | | / __|| |/ /   | |    / _` | / __|| |/ /
   | |   | || (__ |   <    | |   | (_| || (__ |   <
   |_|   |_| \___||_|\_\   |_|    \__,_| \___||_|\_\PM4TEST...
   ");
    }
}