<?php

namespace App\Observers;

class AdObserver
{
    public function updating(Ad $ad)
    {
        $ad->user_id = auth()->id();
    }
}
