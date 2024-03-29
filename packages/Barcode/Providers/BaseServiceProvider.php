<?php
namespace TTSoft\Barcode\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class BaseServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $commands = [
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
        \TTSoft\Barcode\Providers\BaseRouteServiceProvider::class,
        \TTSoft\Barcode\Providers\BaseEventServiceProvider::class,
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

        $this->loadViewsFrom(__DIR__.'/../Resources/views', 'barcode');

        $this->loadTranslationsFrom(__DIR__.'/../Resources/lang', 'barcode');

        $this->mergeConfigFrom(__DIR__.'/../Config/config.php', 'barcode');
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
        $this->app->singleton(
            \TTSoft\Barcode\Repositories\BarcodeRepositoryInterface::class,
            \TTSoft\Barcode\Repositories\Eloquent\BarcodeEloquentRepository::class
        );
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