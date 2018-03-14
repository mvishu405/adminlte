<?php

namespace Mvishal\Adminlte\Commands;

use Illuminate\Console\Command;

class AdminlteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'adminlte:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Oops we are working on it!!';

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
     * @return mixed
     */
    public function handle()
    {
        $this->line('Please support me with putting star on github repo');
    }
}
