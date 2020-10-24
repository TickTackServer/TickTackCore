<?php

namespace xtakumatutix\ticktack\event;

use pocketmine\Server;
use xtakumatutix\ticktack\Core;

use xtakumatutix\ticktack\event\Block\BreakEvent;

use xtakumatutix\ticktack\event\Player\JoinEvent;
use xtakumatutix\ticktack\event\Player\DeathEvent;
use xtakumatutix\ticktack\event\Player\InteractEvent;

use xtakumatutix\ticktack\event\Entity\DamageEvent;
use xtakumatutix\ticktack\event\Entity\HitEvent;

class EventManager
{
    public static function registerEvents(Core $core)
    {
        Server::getInstance()->getPluginManager()->registerEvents(new BreakEvent($core),$core);
        Server::getInstance()->getPluginManager()->registerEvents(new JoinEvent($core),$core);
        Server::getInstance()->getPluginManager()->registerEvents(new DeathEvent(),$core);
        Server::getInstance()->getPluginManager()->registerEvents(new InteractEvent($core),$core);
        Server::getInstance()->getPluginManager()->registerEvents(new DamageEvent(),$core);
        Server::getInstance()->getPluginManager()->registerEvents(new HitEvent(),$core);
    }
}