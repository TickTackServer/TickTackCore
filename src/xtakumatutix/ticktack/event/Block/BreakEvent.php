<?php

namespace xtakumatutix\ticktack\event\Block;

use onebone\economyapi\EconomyAPI;
use pocketmine\event\Listener;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\Tool;
use pocketmine\Player;
use xtakumatutix\ticktack\Core;

class BreakEvent implements Listener
{
    private $core;

    public function __construct(Core $core)
    {
        $this->core = $core;
    }
    public function onbreak(BlockBreakEvent $event)
    {
        $player = $event->getPlayer();
        $config = $this->core->mode;
        if (!$config->exists($player->getName())){
            if (!$event->isCancelled()){
                $event->setDrops([]);
                EconomyAPI::getInstance()->addMoney($player,"100");
                $player->sendTip('100 円 GET');
            }

        }
    }
}