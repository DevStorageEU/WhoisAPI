<?php

namespace App\Console;

use App\Console\Commands\GenerateApplicationKey;
use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    /** @var array */
    protected $commands = [
        GenerateApplicationKey::class
    ];

    protected function schedule(Schedule $schedule): void
    {
        //
    }
}
