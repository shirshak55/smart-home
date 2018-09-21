<?php

namespace App\Observers;

use App\Smartpower;

class SmartpowerObserver
{
    /**
     * Handle the smartpower "created" event.
     *
     * @param  \App\Smartpower  $smartpower
     * @return void
     */
    public function created(Smartpower $smartpower)
    {
        $smartpower->setPin();
    }

    /**
     * Handle the smartpower "updated" event.
     *
     * @param  \App\Smartpower  $smartpower
     * @return void
     */
    public function updated(Smartpower $smartpower)
    {
        $smartpower->setPin();
    }

    /**
     * Handle the smartpower "deleted" event.
     *
     * @param  \App\Smartpower  $smartpower
     * @return void
     */
    public function deleted(Smartpower $smartpower)
    {
        //
    }

    /**
     * Handle the smartpower "restored" event.
     *
     * @param  \App\Smartpower  $smartpower
     * @return void
     */
    public function restored(Smartpower $smartpower)
    {
        //
    }

    /**
     * Handle the smartpower "force deleted" event.
     *
     * @param  \App\Smartpower  $smartpower
     * @return void
     */
    public function forceDeleted(Smartpower $smartpower)
    {
        //
    }
}
