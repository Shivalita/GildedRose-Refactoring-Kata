<?php

namespace App\Updater;

class ConjuredItemUpdater extends ItemUpdater
{
    public static function resolve($item) : bool
    {
        if ($item == 'Conjured Mana Cake') {
            return true;
        } else {
            return false;
        }
    }

    // public function decreaseQuality() : void
    // {

    //     $decreaseResult = $this->item->quality -= 2;

    //     if ($decreaseResult >= 0) {
    //         $this->item->quality = $decreaseResult;
    //     } else {
    //         $this->item->quality = 0;
    //     }
    // }
}

