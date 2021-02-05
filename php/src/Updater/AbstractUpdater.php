<?php

namespace App\Updater;

abstract class AbstractUpdater
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

    abstract public function update() : void;

    abstract public static function resolve($item) : bool;
}