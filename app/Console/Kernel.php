<?php

namespace App\Console;

use App\Jobs\UpdateStatusVenipak;
use App\Jobs\UpdateStockAjs;
use App\Jobs\UpdateStockB1;
use App\Jobs\UpdateStockMaxgear;
use App\Jobs\UpdateStockSkv;
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
        // synchronization stock every day
        $schedule->job(new UpdateStockSkv(), 'update_stock')->dailyAt('04:00');
        $schedule->job(new UpdateStatusVenipak(), 'default')->everyTwoHours();
        $schedule->job(new UpdateStockB1(), 'update_stock')->dailyAt('04:00');
        $schedule->job(new UpdateStockAjs(), 'update_stock')->dailyAt('04:00');
        $schedule->job(new UpdateStockMaxgear(), 'update_stock')->dailyAt('17:32');
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
