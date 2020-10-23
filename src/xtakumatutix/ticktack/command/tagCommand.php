<?php

namespace xtakumatutix\ticktack\Command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class tagCommand extends Command
{
    public function __construct()
    {
        parent::__construct("tag", "称号", "/tag (付けたい称号)");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player) {
            if (isset($args[0])) {
                $name = $sender->getName();
                $length = mb_strlen($args[0]);
                $section = mb_substr_count($args[0], "§");
                $count = $length - $section * 2;
                if ($count < 16) {
                    $sender->sendMessage('§bINFO §f>> 称号を"' . $args[0] . '"にしました');
                    $sender->setDisplayName("§b§r" . $data[0] . "§r§b§r " . $name);
                } else {
                    $sender->sendMessage('§cINFO §f>> 15字以内にしてください');
                }
            } else {
                $sender->sendMessage('§cINFO §f>> 付けたい称号を入力してください');
            }
        }else{
            $sender->sendMessage('ゲーム内のみ');
        }
    }
}