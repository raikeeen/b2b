<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\B1Api;
class test1 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:testb1';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        B1Api::synchronizationStock();
        return Command::SUCCESS;
    }
}
