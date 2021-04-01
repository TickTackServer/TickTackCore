<?php

namespace xtakumatutix\ticktack\form;

use pocketmine\form\Form;
use pocketmine\Player;

class StatusForm implements Form
{
    public function handleResponse(Player $player, $data): void
    {
        if ($data === null) {
            return;
        }
    }

    public function jsonSerialize()
    {
        return [
            'type' => 'custom_form',
            'title' => 'ステータス表示',
            'content' => [
                [
                    'type' => 'label',
                    'text' => '今あなたのステータスは'//todo
                ]
            ]
        ];
    }
}