<?php

namespace App;

class AgedBrieUpdater extends ItemUpdater
{
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