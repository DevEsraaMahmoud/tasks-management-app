<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StartApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'start the app';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting application...');
        exec('php artisan serve');
    }
}
