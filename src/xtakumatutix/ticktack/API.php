<?php

namespace xtakumatutix\ticktack;

use xtakumatutix\ticktack\Core;
use pocketmine\Player;
use pocketmine\network\mcpe\protocol\PlaySoundPacket;

class API
{
    static $instance;

    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new API();
        }
        return self::$instance;
    }

    public function sendSound(Player $player, String $soundName){
        $pk = new PlaySoundPacket();
        $pk->soundName = $soundName;
        $pk->x = $player->x;
        $pk->y = $player->y;
        $pk->z = $player->z;
        $pk->volume = 1;
        $pk->pitch = 1;
        $player->dataPacket($pk);
    }
}