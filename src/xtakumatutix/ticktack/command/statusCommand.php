<?php

namespace xtakumatutix\ticktack\Command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\utils\Config;
use xtakumatutix\ticktack\Core;
use xtakumatutix\ticktack\form\StatusForm;

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
            $sender->sendForm(new StatusForm());
        }else{
            $sender->sendMessage('ゲーム内のみ');
        }
    }
}