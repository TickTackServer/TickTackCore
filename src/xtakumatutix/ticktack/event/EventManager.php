<?php

namespace xtakumatutix\ticktack\event;

use pocketmine\Server;
use xtakumatutix\ticktack\Core;

use xtakumatutix\ticktack\event\Player\JoinEvent;
use xtakumatutix\ticktack\event\Player\DeathEvent;

use xtakumatutix\ticktack\event\Entity\DamageEvent;

class EventManager
{
    public static function registerEvents(Core $core)
    {
        Server::getInstance()->getPluginManager()->registerEvents(new JoinEvent(),$core);
        Server::getInstance()->getPluginManager()->registerEvents(new DeathEvent(),$core);
        Server::getInstance()->getPluginManager()->registerEvents(new DamageEvent(),$core);
    }
}