<?php

namespace App\Console;

use App\Jobs\UpdateStocks;
use App\Models\AjsApi;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\B1Api;
use Illuminate\Support\Facades\Queue;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\test1::class,
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
       // $schedule->job(new UpdateStocks())->dailyAt('16:02');
        $schedule->call(function () {
            Queue::push(new UpdateStocks());
        })->dailyAt('22:00');
        // synchronization stock ajs every day

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
}
