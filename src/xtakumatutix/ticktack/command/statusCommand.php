<?php

namespace xtakumatutix\ticktack\Command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\utils\Config;
use xtakumatutix\ticktack\Core;
use xtakumatutix\ticktack\form\StatusForm;

class statusCommand extends Command
{
    
    public function __construct()
    {
        parent::__construct("status", "ステータスを確認します", "/status");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player) {
            $sender->sendForm(new StatusForm());
        }else{
            $sender->sendMessage('ゲーム内のみ');
        }
    }
}