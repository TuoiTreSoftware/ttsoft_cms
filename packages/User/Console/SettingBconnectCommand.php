<?php

namespace TTSoft\User\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use TTSoft\User\Entities\User;
class SettingBconnectCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The systems will setup Ialc English';

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
        
    }


    private function create(array $array){
        User::create($array);
    }
}
