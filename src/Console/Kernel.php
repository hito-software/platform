<?php

namespace Hito\Platform\Console;

use Illuminate\Console\Application as Artisan;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    private array $providesCommands = [
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        foreach ($this->providesCommands as $command) {
            Artisan::starting(function ($artisan) use ($command) {
                $artisan->resolve($command);
            });
        }

        require __DIR__ . '/../../routes/console.php';
    }
}
