<?php

namespace Just\Warehouse\Observers;

use LogicException;
use Just\Warehouse\Models\Location;

class LocationObserver
{
    /**
     * Handle the Location "deleting" event.
     *
     * @param  \Just\Warehouse\Models\Location  $location
     * @return void
     */
    public function deleting(Location $location)
    {
        if ($location->inventory()->withTrashed()->get()) {
            throw new LogicException('Location can not be deleted because it has inventory.');
        }
    }
}