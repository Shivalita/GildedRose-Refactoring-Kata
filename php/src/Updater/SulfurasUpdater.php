<?php

namespace App\Updater;

class SulfurasUpdater extends ItemUpdater
{
	public static function resolve($item) : bool
    {
        if ($item == 'Sulfuras, Hand of Ragnaros') {
            return true;
        } else {
            return false;
        }
	}
	
	public function update() : void
    {
		//never has to be sold or decreases in Quality 
	}
}

