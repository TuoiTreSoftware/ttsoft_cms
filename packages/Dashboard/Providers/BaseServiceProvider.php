<?php
namespace TTSoft\Dashboard\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class BaseServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $commands = [
        \TTSoft\Dashboard\Console\SettingBconnectCommand::class,
    ];
    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
    ];
    /**
     * Boot the register provider.
     *
     * @return void
     */
    
    protected $registerProvider = [
        \TTSoft\Dashboard\Providers\BaseRouteServiceProvider::class,
        \TTSoft\Dashboard\Providers\BaseEventServiceProvider::class,
    ];
    /**
     * Boot the service provider.
     *
     * @return void
     */
    

    public function boot()
    {
        $this->registerHelpers();

        $this->registerAppServices();

        $this->loadViewsFrom(__DIR__.'/../Resources/views', 'dashboard');

        $this->loadTranslationsFrom(__DIR__.'/../Resources/lang', 'dashboard');

        $this->mergeConfigFrom(__DIR__.'/../Config/config.php', 'dashboard');
    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerRouteMiddleware();
        $this->commands($this->commands);
    }

    /**
     * Register registerRouteMiddleware
     *
     * @return void
     */
    protected function registerRouteMiddleware()
    {
        foreach ($this->routeMiddleware as $key => $value) {
            app('router')->aliasMiddleware($key, $value);
        }
    }


    /**
     *
     * Register Service Provider
     *
     */
    protected function registerAppServices(){
        foreach ($this->registerProvider as $value) {
            $this->app->register($value);
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
        if (file_exists($file = __DIR__.'/../Helpers/Helpers.php'))
        {
            require $file;
        }
    }
    
}