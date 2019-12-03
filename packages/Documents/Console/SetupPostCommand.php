<?php

namespace TTSoft\Documents\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use TTSoft\Documents\Entities\Documents;
class SetupPostCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cms:move-data-post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Move data';

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
        $this->info('Starting move...');
        foreach (Documents::all() as $key => $value) {
            $value->categories()->attach($value->category_id);
        }
    }

}
