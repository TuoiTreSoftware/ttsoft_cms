<?php
namespace TTSoft\Products\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class BaseServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $commands = [
        \TTSoft\Products\Console\CreateRandomProduct::class,
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
        \TTSoft\Products\Providers\BaseRouteServiceProvider::class,
        \TTSoft\Products\Providers\BaseEventServiceProvider::class,
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

        $this->loadViewsFrom(__DIR__.'/../Resources/views', 'product');

        $this->loadTranslationsFrom(__DIR__.'/../Resources/lang', 'product');

        $this->mergeConfigFrom(__DIR__.'/../Config/config.php', 'product');

        view()->composer([
            'product::product.attribute.create-attribute',
            'product::product.attribute.edit-attribute',
            'product::product.attribute.attr-create',
            'product::product.attribute.attr-edit',
        ],\TTSoft\Products\Http\ViewComposers\AttributeComposer::class);
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
            \TTSoft\Products\Repositories\ProductRepositoryInterface::class,
            \TTSoft\Products\Repositories\Eloquent\ProductEloquentRepository::class
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