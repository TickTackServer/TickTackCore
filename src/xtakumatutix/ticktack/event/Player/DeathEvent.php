<?php

namespace xtakumatutix\ticktack\event\Player;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDeathEvent;

class DeathEvent implements Listener
{
    public function ondeath(PlayerDeathEvent $event)
    {
        $player = $event->getPlayer();
        $event->setDeathMessage('§bINFO §f>> '.$player->getName().'が死亡しました');
        $event->setKeepInventory(true);
    }
}