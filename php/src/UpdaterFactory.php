<?php

namespace App;
use App\Updater\AbstractUpdater;
use App\Updater\AgedBrieUpdater;
use App\Updater\BackstagePassUpdater;
use App\Updater\ConjuredItemUpdater;
use App\Updater\ItemUpdater;
use App\Updater\SulfurasUpdater;

class UpdaterFactory
{
    private $updaterFactoryRegistry;

    public function __construct($updaterFactoryRegistry)
    {
        $this->updaterFactoryRegistry = $updaterFactoryRegistry;
    }

    public function build($item) : AbstractUpdater
    {
        $className = $this->updaterFactoryRegistry->resolve($item->name);
        return self::newClass($className, $item);
    }

    protected static function newClass(string $className, Item $item)
    {
        $updaterMatchingItemName = new $className($item);
        return $updaterMatchingItemName;
    }
}