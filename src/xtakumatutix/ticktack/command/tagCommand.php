<?php

namespace xtakumatutix\ticktack\Command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\utils\Config;
use xtakumatutix\ticktack\Core;

class tagCommand extends Command
{
    private $core;

    public function __construct(Core $core)
    {
        parent::__construct("tag", "称号", "/tag (付けたい称号)");
        $this->core = $core;
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player) {
            if (isset($args[0])) {
                $config = $this->core->tag;
                $name = $sender->getName();
                $length = mb_strlen($args[0]);
                $section = mb_substr_count($args[0], "§");
                $count = $length - $section * 2;
                if ($count < 16) {
                    $config->set($name, $args[0]);
                    $config->save();
                    $sender->sendMessage('§bINFO §f>> 称号を"' . $args[0] . '"にしました');
                    $sender->setDisplayName($args[0] . ' ' . $name);
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