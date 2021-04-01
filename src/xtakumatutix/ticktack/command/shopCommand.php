<?php

namespace xtakumatutix\ticktack\Command;

use korado531m7\InventoryMenuAPI\inventory\DoubleChestInventory;
use korado531m7\InventoryMenuAPI\InventoryMenu;
use korado531m7\InventoryMenuAPI\inventory\MenuInventory;
use korado531m7\InventoryMenuAPI\InventoryType;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\item\Item;

class shopCommand extends Command
{
    public function __construct()
    {
        parent::__construct("shop", "全品100円shopを開きます", "/shop");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        $sender->sendMessage("実装予定です");
        //TODO formかインベントリで購入できるようにしたい
        return true;
    }
}