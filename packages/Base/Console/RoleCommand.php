<?php

namespace TTSoft\Base\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use TTSoft\User\Entities\PermissionGroup;
use TTSoft\User\Entities\Permission;
use DB;
class RoleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cms:setup:permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The systems will setup Role Module';

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
        DB::table('permission_group')->delete();
        DB::table('permissions')->delete();
        $permissions = config_permission_merge();
        foreach ($permissions as $key => $value) {
            $data = [
                'name' => ucfirst($value['name']),
                'descrition' => trans('Quản lý module ') . ucfirst($value['name']),
            ];
            $group = PermissionGroup::firstOrCreate($data);
            if (isset($value['group']) && count($value['group']) > 0) {
                foreach ($value['group'] as $key => $value) {
                    $value['permission_group_id'] = $group->id;
                    Permission::firstOrCreate([
                        'name' => trim($value['name']),
                    ],$value);
                }
            }
        }
        $this->info('Update Permission Successfully');
    }
}
