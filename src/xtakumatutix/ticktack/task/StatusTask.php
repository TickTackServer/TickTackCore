<?php
// https://github.com/yurisi0212/PlayerInfoScoreBoard/blob/master/src/space/yurisi/Task/SendTask.php を参考にしました。

namespace xtakumatutix\ticktack\task;

use onebone\economyapi\EconomyAPI
;
use pocketmine\scheduler\Task;
use pocketmine\Server;
use pocketmine\player\Player;

use xtakumatutix\ticktack\Core;

class StatusTask extends Task{

    public function onRun(): void{
        foreach (Server::getInstance()->getOnlinePlayers() as $player){
            $time = date("m月d日 G時i分");
            $x = $player->getPosition()->getFloorX();
            $y = $player->getPosition()->getFloorY();
            $z = $player->getPosition()->getFloorZ();
            $level = $player->getWorld()->getFolderName();
            $money = EconomyAPI::getInstance()->myMoney($player);
            $item = $player->getInventory()->getItemInHand();
            $id = $item->getMeta();
            $damage = $item->getDamage();
            $ping = $player->getPing();

            $player->setupData($player, "sidebar", "TickTack!!", false);
            $player->sendData($player, "sidebar", "§b今日は、§f" . $time . "§bです", 1);
            $player->sendData($player, "sidebar", "§a座標 §f>> " . $x . "," . $y . "," . $z . " " . $level, 2);
            $player->sendData($player, "sidebar", "§e所持金 §f>> " . $money . "§e円", 3);
            $player->sendData($player, "sidebar", "§dPing値 §f>> " . $ping, 4);
            $player->sendData($player, "sidebar", "§cアイテムID §f>> " . $id . ":" . $damage, 5);
        }
    }
    
    private function setupData(Player $player) {
    $pk = new SetDisplayObjectivePacket();
    $pk->displaySlot = "sidebar";
    $pk->objectiveName = "sidebar";
    $pk->displayName = "TickTack!!";
    $pk->criteriaName = "dummy";
    $pk->sortOrder = 0;
    $player->getNetworkSession()->sendDataPacket($pk);
  }

  private function sendData(Player $player, string $data, int $id) {
    $entry = new ScorePacketEntry();
    $entry->objectiveName = "sidebar";
    $entry->type = $entry::TYPE_FAKE_PLAYER;
    $entry->customName = $data;
    $entry->score = $id;
    $entry->scoreboardId = $id + 11;
    $pk = new SetScorePacket();
    $pk->type = $pk::TYPE_CHANGE;
    $pk->entries[] = $entry;
    $player->getNetworkSession()->sendDataPacket($pk);
  }
}

