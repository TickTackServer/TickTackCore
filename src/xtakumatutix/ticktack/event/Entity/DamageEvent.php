<?php

namespace xtakumatutix\ticktack\event\Entity;

use pocketmine\event\Listener;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\Player;

class DamageEvent implements Listener
{
    public function onDamage(EntityDamageByEntityEvent $event)
    {
        $entity = $event->getDamager();
        if ($entity instanceof Player) {
            $kakuritu = mt_rand(1, 10);
            if ($kakuritu == 1) {
                if ($entity->getInventory()->getItemInHand()->getId() == 50) {
                    $damager = $event->getEntity();
                    if ($damager instanceof Player) {
                        $damager->setOnFire(60);
                        $damager->sendTip('§eWARRING §f>> §e' . $entity->getName() . 'に松明で殴られて燃えました');
                        $entity->sendMessage('§eWARRING §f>> §e' . $damager->getName() . 'を松明で燃やしました');
                    }
                }
            }
        }
    }
}