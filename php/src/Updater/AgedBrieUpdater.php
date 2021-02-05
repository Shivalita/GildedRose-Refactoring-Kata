<?php

namespace App\Updater;

class AgedBrieUpdater extends ItemUpdater
{
    public static function resolve($item) : bool
    {
        if ($item == 'Aged Brie') {
            return true;
        } else {
            return false;
        }
    }

    public function updateQuality() : void
    {
        if ($this->item->sell_in > 0) {
            $this->increaseQuality();
        } else {
            $this->updateExpired();
        }
    }

    protected function updateExpired() : void
    {
        $this->increaseQuality();
        $this->increaseQuality();
    }
}