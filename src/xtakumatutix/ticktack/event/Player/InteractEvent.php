<?php

namespace xtakumatutix\ticktack\event\Player;

use pocketmine\block\Anvil;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\Item;
use pocketmine\item\Tool;
use pocketmine\player\Player;
use pocketmine\utils\Config;
//use xtakumatutix\ticktack\API;
use xtakumatutix\ticktack\Core;

class InteractEvent implements Listener
{
    private $core;

    public function __construct(Core $core)
    {
        $this->core = $core;
    }

    public function ontap(PlayerInteractEvent $event)
    {
        $player = $event->getPlayer();
        $item = $player->getInventory()->getItemInHand();
        $this->onmodechange($player, $item);
    }

    public function onmodechange(Player $player, Item $item)
    {
        if ($item instanceof Tool) {
            if ($player->isSneaking() === true) {
                $config = $this->core->mode;
                if (!$config->exists($player->getName())) {
                    $player->sendMessage('§6Mode §f>> 資源モード');
                    $player->sendMessage('§a--------------------');
                    $player->sendMessage('§fアイテムがドロップするよ！');
                    $player->sendMessage('§f収入はありません');
                    $player->sendMessage('§a--------------------');
                    //API::getInstance()->sendSound($player, "random.click");
                    $config->set($player->getName());
                    $config->save();
                    return true;
                } else {
                    $player->sendMessage('§6Mode §f>> 収入モード');
                    $player->sendMessage('§e--------------------');
                    $player->sendMessage('§fランダム金額で収入が入ります');
                    $player->sendMessage('§fアイテムは手に入りません。');
                    $player->sendMessage('§e--------------------');
                    //API::getInstance()->sendSound($player, "random.click");
                    $config->remove($player->getName());
                    $config->save();
                    return true;
                }
            }
        }
    }

    public function Anvil(Player $player, Item $item)
    {
        if ($item instanceof Anvil) {
            if ($player->isSneaking() == true) {
                $player->sendMessage("未実装です！！");
            }else{
                $player->sendTip('§bINFO §f>> スニークすると金床メニューを開きます');
            }
        }
    }
}