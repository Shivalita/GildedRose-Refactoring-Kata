<?php

namespace App;

class ItemUpdater
{

    protected $item;

    function __construct($item)
    {
        $this->item = $item;
    }

    public function __toString()
    {
        return "{$this->item}";
    }

    protected function decreaseQuality() : void
    {
        if ($this->item->quality > 0) {
            $this->item->quality -= 1;
        }
    }

    public function updateSellIn() : void
    {
      $this->item->sell_in -= 1;
    }

    public function updateQuality() : void
    {
        if ($this->item->sell_in > 0) {
            $this->decreaseQuality();
        } else {
            $this->updateExpired();
        }
    }

    protected function increaseQuality() : void
    {
        if ($this->item->quality < 50) {
            $this->item->quality += 1;
        }
    }

    public function update() : void
    {
        $this->updateQuality();
        $this->updateSellIn();
    }

    protected function updateExpired() : void
    {
        $decreaseResult = $this->item->quality -= 2;

        if ($decreaseResult >= 0) {
            $this->item->quality = $decreaseResult;
        } else {
            $this->item->quality = 0;
        }
    }
}

