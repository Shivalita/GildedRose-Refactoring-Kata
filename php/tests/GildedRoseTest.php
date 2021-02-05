<?php

declare(strict_types=1);

namespace Tests;

use App\GildedRose;
use App\Item;
use App\Updater\AbstractUpdater;
use App\Updater\AgedBrieUpdater;
use App\Updater\BackstagePassUpdater;
use App\Updater\ConjuredItemUpdater;
use App\Updater\ItemUpdater;
use App\Updater\SulfurasUpdater;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testFoo(): void
    {
        $items = [new Item('foo', 0, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('fixme', $items[0]->name);
    }
}
