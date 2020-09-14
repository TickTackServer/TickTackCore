<?php

namespace xtakumatutix\ticktack\event\Entity;

use pocketmine\entity\projectile\Arrow;
use pocketmine\event\Listener;
use pocketmine\event\entity\ProjectileHitEvent;

class HitEvent implements Listener
{
    public function onDamage(ProjectileHitEvent $event){
        $event->getEntity()->kill();
    }
}