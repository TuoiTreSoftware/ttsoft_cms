<?php

namespace TTSoft\About\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use TTSoft\About\Entities\About;
class AboutCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'About:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert data in table';

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
        $data = [
            [
                'title' => 'DRIVE YOU TO SUCCESS',
                'slug' => About::DRIVE_YOU_TO_SUCCESS,
                'slogan' => '',
            ],
            [
                'title' => 'NHỮNG LỢI ÍCH CHÚNG TÔI MANG ĐẾN CHO BẠN copy',
                'slug' => About::LOI_IT_CHUNG_TOI_MANG_DEN_CHO_BAN,
                'slogan' => 'Thành viên HCT có lợi ích gì?',
            ],
            [
                'title' => 'Không gian HCT',
                'slug' => About::SPACE_HCT,
                'slogan' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem',
            ],
            [
                'title' => 'NGƯỜI TRONG CUỘC NÓI GÌ VỀ HCT?',
                'slug' => About::SPEAK_OF_HCT,
                'slogan' => '',
            ],
        ];

        foreach ($data as $key => $value) {
            About::create($value);
        }
        $this->info('Insert data successfully');
    }
}
