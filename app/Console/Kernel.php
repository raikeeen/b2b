<?php

namespace App\Console;

use App\Jobs\UpdateStockAjs;
use App\Jobs\UpdateStockB1;
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
        // synchronization stock every day
        $schedule->job(new UpdateStockB1(), 'update_stock')->dailyAt('12:37');
        $schedule->job(new UpdateStockAjs(), 'update_stock')->dailyAt('12:37');
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
