<?php

namespace xtakumatutix\ticktack\event\Player;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use xtakumatutix\ticktack\API;

class JoinEvent implements Listener
{
    public function onjoin(PlayerJoinEvent $event)
    {
        $player = $event->getPlayer();
        $name = $player->getName();
        $player->sendMessage('§bINFO §f>> §a現在β段階です');
        $player->sendTitle('TickTack Server!', 'Version >> β');
        API::getInstance()->sendSound($player, 'block.bamboo.hit');
        if ($player->isOp()){
            $event->setJoinMessage('§6JOIN §f>> §aOPの'.$name.'が参加しました');
        }else{
            $event->setJoinMessage('§6JOIN §f>> §f'.$name.'が参加しました');
        }
    }
}