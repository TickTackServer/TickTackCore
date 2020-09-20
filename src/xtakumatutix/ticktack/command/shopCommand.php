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
        $inv = new DoubleChestInventory();
        $items = [0 => Item::get(1,0,1), 1 => Item::get(2,0,1), 2 => Item::get(3,0,1), 3 => Item::get(4,0,1), 4 => Item::get(5,0,1)];
        $inv->setTitle('Shop');
        $inv->setContents($items);
        $sender->addWindow($inv);
        return true;
    }
}