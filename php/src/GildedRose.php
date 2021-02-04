<?php

namespace App;

final class GildedRose
{
    private $items = [];

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function updateQuality() : void
    {
        foreach ($this->items as $item) {
            $this->updateItem($item);
        }
    }


    public function updateItem(Item $item) : void
    {
        $classifier = new ItemClassifier();

        $updater = $classifier->categorize($item);

        $updater->update();
    }

}
