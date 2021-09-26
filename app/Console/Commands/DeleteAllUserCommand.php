<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeleteAllUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:delete {userId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'day la command xoa user ';

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
        echo $this->argument('userId');
        return 0;
    }
}
