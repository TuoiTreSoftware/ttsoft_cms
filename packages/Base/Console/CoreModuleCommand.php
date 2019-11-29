<?php

namespace TTSoft\Base\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
class CoreModuleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:make {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The systems will create module with name you entered';

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
        $module = $this->argument('name');

        if (!file_exists(base_path("packages/{$module}"))) {
            mkdir(base_path("packages/{$module}"), 0777, true);
            $this->config($module);
            $this->console($module);
            $this->entities($module);
            $this->file($module);
            $this->services($module);
            $this->helpers($module);
            $this->providers($module);
            $this->resources($module);
            $this->repositories($module);
            $this->http($module);
        }

        $this->info("Module {$module} has been createed");
    }


    protected function http($module){
        mkdir(base_path("packages/{$module}/Http"), 0777, true);
        mkdir(base_path("packages/{$module}/Http/Controllers/Admin"), 0777, true);
        mkdir(base_path("packages/{$module}/Http/Middleware"), 0777, true);
        mkdir(base_path("packages/{$module}/Http/Requests"), 0777, true);
        mkdir(base_path("packages/{$module}/Http/routes"), 0777, true);
        mkdir(base_path("packages/{$module}/Http/ViewComposers"), 0777, true);
$content = "<?php

/*Trang quản trị - /admin */
Route::middleware(['admin'])->prefix(config('ttsoft.cms_path'))->group(function () {
    Route::prefix('".strtolower($module)."')->group(function () {
    });
});
";
$fp = fopen(base_path("packages/{$module}/Http/routes/admin.php"),"wb");
fwrite($fp,$content);
fclose($fp);


//controller
$controller = "<?php

namespace TTSoft\\{$module}\\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use TTSoft\\{$module}\\Repositories\\{$module}RepositoryInterface;
class {$module}Controller extends Controller
{

}";
$fp = fopen(base_path("packages/{$module}/Http/Controllers/Admin/{$module}Controller.php"),"wb");
fwrite($fp,$controller);
fclose($fp);
    }
    protected function repositories($module){
        mkdir(base_path("packages/{$module}/Repositories"), 0777, true);
        mkdir(base_path("packages/{$module}/Repositories/Eloquent"), 0777, true);

        $content = "<?php 

namespace TTSoft\\{$module}\\Repositories;

interface {$module}RepositoryInterface
{
    
}

";
            $fp = fopen(base_path("packages/{$module}/Repositories/{$module}RepositoryInterface.php"),"wb");
            fwrite($fp,$content);
            fclose($fp);


            $eloquent = "<?php 

namespace TTSoft\\{$module}\\Repositories\Eloquent;

use TTSoft\\{$module}\\Repositories\\{$module}\\RepositoryInterface;

use TTSoft\Base\Repositories\Eloquent\EloquentRepository;
/**
* @return class name use repository
*/
class {$module}EloquentRepository extends EloquentRepository implements {$module}RepositoryInterface
{
    
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \\TTSoft\\{$module}\\Entities\\{$module}::class;
    }

    
}";
            $fp = fopen(base_path("packages/{$module}/Repositories/Eloquent/{$module}EloquentRepository.php"),"wb");
            fwrite($fp,$eloquent);
            fclose($fp);

    }


    protected function resources($module){
        mkdir(base_path("packages/{$module}/Resources/views"), 0777, true);
        mkdir(base_path("packages/{$module}/Resources/lang/vn"), 0777, true);
        mkdir(base_path("packages/{$module}/Resources/lang/en"), 0777, true);
            $content = "<?php 
return [
    'modules' => '".$module."'
];";
            $fp = fopen(base_path("packages/{$module}/Resources/views/index.blade.php"),"wb");
            fwrite($fp,$content);
            fclose($fp);

            $fp = fopen(base_path("packages/{$module}/Resources/lang/vn/".strtolower($module).".php"),"wb");
            fwrite($fp,$content);
            fclose($fp);

            $fp = fopen(base_path("packages/{$module}/Resources/lang/en/".strtolower($module).".php"),"wb");
            fwrite($fp,$content);
            fclose($fp);
    }


    protected function config($module){
        mkdir(base_path("packages/{$module}/Config"), 0777, true);
            $content = "<?php 
return [
    'modules' => '".$module."'
];";
            $fp = fopen(base_path("packages/{$module}/Config/config.php"),"wb");
            fwrite($fp,$content);
            fclose($fp);

            //menu

            $content = "<?php 

return [
    'name' => '".$module."',
    'route' => '',
    'sort' => 1,
    'active'=> '".strtolower($module)."',
    'icon' => ' icon-menu',
    'middleware' => [],
    'group' => [
        
    ]
];";
            $fp = fopen(base_path("packages/{$module}/Config/menu.php"),"wb");
            fwrite($fp,$content);
            fclose($fp);

            //permission

            $content = "<?php 
return [
    '".strtolower($module)."' => ''
];";
            $fp = fopen(base_path("packages/{$module}/Config/permission.php"),"wb");
            fwrite($fp,$content);
            fclose($fp);
    }

    /**
     *
     * Module Console
     *
     */
    
    protected function console($module){
        mkdir(base_path("packages/{$module}/Console"), 0777, true);
        $content = "<?php

namespace TTSoft\\{$module}\\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
class {$module}Command extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected {signature} = '".strtolower($module).":setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected {description} = 'The systems will setup Ialc English';

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
}
";
        $content = str_replace("{signature}", '$signature', $content);
        $content = str_replace("{description}", '$description', $content);
        $fp = fopen(base_path("packages/{$module}/Console/{$module}Console.php"),"wb");
        fwrite($fp,$content);
        fclose($fp);
    }

    protected function entities($module){
        mkdir(base_path("packages/{$module}/Entities"), 0777, true);
        $content = "<?php

namespace TTSoft\\{$module}\\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class {$module} extends Model
{
    use SoftDeletes;

    protected {table} = '".strtolower($module)."';

    protected {primaryKey} = 'id';

    protected {dates} = ['deleted_at'];
    
    protected {guarded} = [];

    public {timestamps} = true;

 
}
";      $content = str_replace("{table}", '$table', $content);
        $content = str_replace("{primaryKey}", '$primaryKey', $content);
        $content = str_replace("{dates}", '$dates', $content);
        $content = str_replace("{guarded}", '$guarded', $content);
        $content = str_replace("{timestamps}", '$timestamps', $content);
        $fp = fopen(base_path("packages/{$module}/Entities/{$module}.php"),"wb");
        fwrite($fp,$content);
        fclose($fp);
    }

    protected function file($module){
        $content = '';
        $fp = fopen(base_path("packages/{$module}/composer.json"),"wb");
            fwrite($fp,$content);
            fclose($fp);
        $fp = fopen(base_path("packages/{$module}/module.json"),"wb");
            fwrite($fp,$content);
            fclose($fp);
        $fp = fopen(base_path("packages/{$module}/README.md"),"wb");
            fwrite($fp,$content);
            fclose($fp);
    }

    protected function helpers($module){
        mkdir(base_path("packages/{$module}/Helpers"), 0777, true);
$content = "<?php 
";
        $fp = fopen(base_path("packages/{$module}/Helpers/Helpers.php"),"wb");
        fwrite($fp,$content);
        fclose($fp);
    }

    protected function services($module){
        mkdir(base_path("packages/{$module}/Services"), 0777, true);
        $content = "<?php

namespace TTSoft\\{$module}\\Services;

class {$module}Services
{
}
";
            $fp = fopen(base_path("packages/{$module}/Services/{$module}Services.php"),"wb");
            fwrite($fp,$content);
            fclose($fp);
    }


    protected function providers($module){
        mkdir(base_path("packages/{$module}/Providers"), 0777, true);
        $content = "<?php
namespace TTSoft\\{$module}\\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class BaseServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected {commands} = [
    ];
    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected {routeMiddleware} = [
    ];
    /**
     * Boot the register provider.
     *
     * @return void
     */
    
    protected {registerProvider} = [
        \TTSoft\\{$module}\\Providers\BaseRouteServiceProvider::class,
        \TTSoft\\{$module}\\Providers\BaseEventServiceProvider::class,
    ];
    /**
     * Boot the service provider.
     *
     * @return void
     */
    

    public function boot()
    {
        {this}->registerHelpers();

        {this}->registerAppServices();

        {this}->loadViewsFrom(__DIR__.'/../Resources/views', '".strtolower($module)."');

        {this}->loadTranslationsFrom(__DIR__.'/../Resources/lang', '".strtolower($module)."');

        {this}->mergeConfigFrom(__DIR__.'/../Config/config.php', '".strtolower($module)."');
    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        {this}->registerRouteMiddleware();
        {this}->commands({this}->commands);
        {this}->app->singleton(
            \TTSoft\\{$module}\\Repositories\\{$module}RepositoryInterface::class,
            \TTSoft\\{$module}\\Repositories\\Eloquent\\{$module}EloquentRepository::class
        );
    }

    /**
     * Register registerRouteMiddleware
     *
     * @return void
     */
    protected function registerRouteMiddleware()
    {
        foreach ({this}->routeMiddleware as {key} => {value}) {
            app('router')->aliasMiddleware({key}, {value});
        }
    }


    /**
     *
     * Register Service Provider
     *
     */
    protected function registerAppServices(){
        foreach ({this}->registerProvider as {value}) {
            {this}->app->register({value});
        }
    }

    /**
     *
     * Function Helper Autoload File
     *
     */
    public function registerHelpers()
    {
        // Load the helpers in app/Http/helpers.php
        if (file_exists({file} = __DIR__.'/../Helpers/Helpers.php'))
        {
            require {file};
        }
    }
    
}";
        $content = str_replace('{this}', '$this', $content);
        $content = str_replace('{commands}', '$commands', $content);
        $content = str_replace('{registerProvider}', '$registerProvider', $content);
        $content = str_replace('{routeMiddleware}', '$routeMiddleware', $content);
        $content = str_replace('{key}', '$key', $content);
        $content = str_replace('{value}', '$value', $content);
        $content = str_replace('{file}', '$file', $content);
        $fp = fopen(base_path("packages/{$module}/Providers/BaseServiceProvider.php"),"wb");
        fwrite($fp,$content);
        fclose($fp);


$envent = "<?php

namespace TTSoft\\{$module}\\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class BaseEventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected {listen} = [
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}";
$envent = str_replace('{listen}', '$listen', $envent);
$fp = fopen(base_path("packages/{$module}/Providers/BaseEventServiceProvider.php"),"wb");
fwrite($fp,$envent);
fclose($fp);


$route = "<?php

namespace TTSoft\\{$module}\\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class BaseRouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected {namespaceAdmin} = 'TTSoft\\{$module}\\Http\Controllers\Admin';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {

        {this}->mapAdminRoutes();
    }

    /**
     * Define the web routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::middleware('web')
             ->namespace({this}->namespaceAdmin)
             ->group(__DIR__.'/../Http/routes/admin.php');
    }
}
";
$route = str_replace('{namespaceAdmin}', '$namespaceAdmin', $route);
$route = str_replace('{this}', '$this', $route);
$fp = fopen(base_path("packages/{$module}/Providers/BaseRouteServiceProvider.php"),"wb");
fwrite($fp,$route);
fclose($fp);

    }
}
