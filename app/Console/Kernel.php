<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\B1Api;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // synchronization stock b1 every day
        $schedule->call(function () {
            B1Api::synchronizationStock();
                })->dailyAt('16:07');

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
    /**
     * Получить часовой пояс, который должен использоваться по умолчанию для запланированных событий.
     *
     * @return \DateTimeZone|string|null
     */
    protected function scheduleTimezone()
    {

    }
}
