<?php

namespace TTSoft\Base\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Base\Entities\User;
class SettingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cms:setup';

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
        $this->line("Settings the system Ialc English...");
        Artisan::call('migrate');
        $first_name = $this->ask('Please you enter first name your');
        $last_name = $this->ask('Please you enter last name your');
        $email = $this->ask('Please you enter email your');
        $password = $this->ask('Please you enter passowrd your');
        $this->create([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'password' => bcrypt($password),
        ]);
        $this->info("Setting CMS Ialc English successfully");
    }


    private function create(array $array){
        User::create($array);
    }
}
