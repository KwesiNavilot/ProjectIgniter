<?php

namespace App\Traits;
use Carbon\Carbon;

trait Essentials
{
    public function greet()
    {
        $hour = Carbon::now()->hour;
        if ($hour < 12) {
            return 'Good morning';
        }
        if ($hour >= 12 && $hour < 17) {
            return 'Good afternoon';
        }

        return 'Good evening';
    }
}
