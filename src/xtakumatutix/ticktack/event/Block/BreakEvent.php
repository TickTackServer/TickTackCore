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
                $money = mt_rand(1, 10);
                EconomyAPI::getInstance()->addMoney($player,$money);
                $player->sendTip('§e'.$money.'円 GET!!');
            }

        }
    }
}