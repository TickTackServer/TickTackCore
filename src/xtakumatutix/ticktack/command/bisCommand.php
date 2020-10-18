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
        parent::__construct("bis", "BlockIDStick", "/bis");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        //TODO
        return true;
    }
}