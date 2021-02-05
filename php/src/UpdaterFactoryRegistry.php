<?php

namespace App;

class UpdaterFactoryRegistry
{
    private array $updaters = [];

    public function resolve($item) 
    {
        foreach ($this->updaters as $u) {
            if($u::resolve($item))
                return $u;
        }
    }

    public function register($updater): void
    {
        $this->updaters[] = $updater;
    }
}
