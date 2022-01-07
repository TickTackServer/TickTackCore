<?php

namespace xtakumatutix\ticktack\event\Entity;

use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\Listener;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\player\Player;

class DamageEvent implements Listener
{
    public function Fall(EntityDamageEvent $event)
    {
        $cause = $event->getCause();
        if ($cause == 4) {
            $event->setCancelled();
        }
    }

    public function Fire(EntityDamageByEntityEvent $event)
    {
        $entity = $event->getDamager();
        if ($entity instanceof Player) {
            $probability = mt_rand(1, 10);
            if ($probability == 1) {
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