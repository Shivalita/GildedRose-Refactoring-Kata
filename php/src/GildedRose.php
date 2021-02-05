<?php

namespace App;

use App\Updater\AbstractUpdater;
use App\Updater\AgedBrieUpdater;
use App\Updater\BackstagePassUpdater;
use App\Updater\ConjuredItemUpdater;
use App\Updater\ItemUpdater;
use App\Updater\SulfurasUpdater;

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


    // public function updateItem(Item $item) : void
    // {
    //     $classifier = new ItemClassifier();

    //     $updater = $classifier->categorize($item);

    //     $updater->update();
    // }

    public function updateItem($item)
    {
        $registry = new UpdaterFactoryRegistry();
        $registry->register(AgedBrieUpdater::class);
        $registry->register(BackstagePassUpdater::class);
        $registry->register(ConjuredItemUpdater::class);
        $registry->register(SulfurasUpdater::class);
        $registry->register(ItemUpdater::class);

        $factory = new UpdaterFactory($registry);
        $updater = $factory->build($item);
        $updater->update();
    }
}
