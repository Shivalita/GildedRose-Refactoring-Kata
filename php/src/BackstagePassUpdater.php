<?php

namespace App;

class BackstagePassUpdater extends ItemUpdater
{
    public function updateQuality() : void
    {
        if ($this->item->sell_in > 0) {
            $this->increaseQuality();
        } else {
            $this->updateExpired();
        }
    }

    public function increaseQuality() : void
    {
        $increaseResult = $this->calculateIncreaseResult();

        if ($increaseResult <= 50) {
            $this->item->quality = $increaseResult;
        } else {
            $this->item->quality = 50;
        }
    }

    public function calculateIncreaseResult() : int
    {
        if ($this->item->sell_in <= 5) {
            $increaseResult = $this->item->quality += 3;
        } else if ($this->item->sell_in <= 10) {
            $increaseResult = $this->item->quality += 2;
        } else {
            $increaseResult = $this->item->quality += 1;
        }

        return $increaseResult;
    }

    public function updateExpired() : void
    {
        $this->item->quality = 0;
    }
}