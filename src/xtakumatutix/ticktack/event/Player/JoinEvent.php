<?php

namespace xtakumatutix\ticktack\event\Player;

use pocketmine\event\Event;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\Player;
use xtakumatutix\ticktack\API;
use xtakumatutix\ticktack\Core;
use pocketmine\utils\Config;

class JoinEvent implements Listener
{
    private $core;

    public function __construct(Core $core)
    {
        $this->core = $core;
    }

    public function onjoin(PlayerJoinEvent $event)
    {
        $player = $event->getPlayer();
        $name = $player->getName();
        $player->sendMessage('§bINFO §f>> §a現在β段階です');
        $player->sendTitle('TickTack Server!', 'Version >> β');
        API::getInstance()->sendSound($player, 'block.bamboo.hit');
        $this->tag($player);
        if ($player->hasPlayedBefore() == false){
            $event->setJoinMessage('§6JOIN §f>> §e' . $name . 'が初参加しました');
            return;
        }

        if ($player->isOp()) {
            $event->setJoinMessage('§6JOIN §f>> §aOPの' . $name . 'が参加しました');
        } else {
            $event->setJoinMessage('§6JOIN §f>> §f' . $name . 'が参加しました');
        }
    }

    public function tag(Player $player){
        $config = $this->core->tag;
        $name = $player->getName();
        if ($config->exists($name)) {
            $tag = $config->get($name);
            $player->setDisplayName($tag . ' ' . $name);
        }else{
            $player->setDisplayName('鯖民 ' . $name);
        }
    }
}