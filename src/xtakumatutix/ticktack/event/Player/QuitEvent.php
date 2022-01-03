<?php

namespace xtakumatutix\ticktack\event\Player;

use pocketmine\event\Event;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\Player;
use xtakumatutix\ticktack\API;
use xtakumatutix\ticktack\Core;
use pocketmine\utils\Config;

class QuitEvent implements Listener
{
    private $core;

    public function __construct(Core $core)
    {
        $this->core = $core;
    }

    public function onjoin(PlayerQuitEvent $event)
    {
        $player = $event->getPlayer();
        $name = $player->getName();
        $event->setQuitMessage('§7Quit §f>> §e' . $name . 'が退出しました...');
    }
}