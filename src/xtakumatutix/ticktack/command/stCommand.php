<?php

namespace xtakumatutix\ticktack\Command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\utils\Config;
use xtakumatutix\ticktack\Core;
use xtakumatutix\ticktack\form\StatusForm;

class stCommand extends Command
{

    public function __construct()
    {
        parent::__construct("st", "ステータスを確認します", "/st");
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