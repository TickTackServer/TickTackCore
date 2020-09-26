<?php

namespace xtakumatutix\ticktack\task;

use onebone\economyapi\EconomyAPI;
use pocketmine\scheduler\Task;
use pocketmine\Server;
use Saisana299\easyscoreboardapi\EasyScoreboardAPI;
use xtakumatutix\ticktack\Core;

class StatusTask extends Task{

    public function onRun(int $tick){
        foreach (Server::getInstance()->getOnlinePlayers() as $player){
            $time = date("m月d日 G時i分");
            $x = $player->getFloorX();
            $y = $player->getFloorY();
            $z = $player->getFloorZ();
            $level = $player->getLevel()->getFolderName();
            $money = EconomyAPI::getInstance()->myMoney($player);
            $item = $player->getInventory()->getItemInHand();
            $id = $item->getId();
            $damage = $item->getDamage();
            $ping = $player->getPing();
            $cloor = mt_rand(0, 9);
            
            $api = EasyScoreboardAPI::getInstance();
            $api->sendScoreBoard($player, "sidebar", "§".$cloor."TickTack!!", false);
            $api->setScore($player, "sidebar", "§b今日は、§f".$time."§bです", 0 , 0);
            $api->setScore($player, "sidebar", "§a座標 §f>> ".$x.",".$y.",".$z." ".$level, 1 , 1);
            $api->setScore($player, "sidebar", "§e所持金 §f>> ".$money."§e円", 2 , 2);
            $api->setScore($player, "sidebar", "§dPing値 §f>> ".$ping, 3 , 3);
            $api->setScore($player, "sidebar", "§cアイテムID §f>> ".$id.":".$damage, 4 , 4);
        }
    }
}

