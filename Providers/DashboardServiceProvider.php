<?php

namespace Modules\Dashboard\Providers;

use Spatie\Menu\Laravel\Html;
use Illuminate\Support\ServiceProvider;

/**
 * Class DashboardServiceProvider
 * @package Modules\Dashboard\Providers
 */
class DashboardServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerConfig();
        $this->registerTranslations();
        $this->registerViews();
        $this->registerMenu();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([
            \Modules\Dashboard\Console\InstallDashboard::class
        ]);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__ . '/../Config/config.php' => config_path('dashboard.php'),
        ]);
        $this->mergeConfigFrom(
            __DIR__ . '/../Config/config.php', 'dashboard'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = base_path('resources/views/modules/dashboard');

        $sourcePath = __DIR__ . '/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ]);

        $this->loadViewsFrom([$viewPath, $sourcePath], 'dashboard');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = base_path('resources/lang/modules/dashboard');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'dashboard');
        } else {
            $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'dashboard');
        }
    }

    /**
     *
     */
    public function registerMenu()
    {
        if(config('dashboard.demoDashboard')) {
            $menu = app('menu.sidebar');
            $menu->add(Html::raw('<li class="header">DASHBOARD</li>'));
            $menu->link('/dashboard/demo', 'Demo')->setActive('/dashboard/demo');
        }
    }

}
