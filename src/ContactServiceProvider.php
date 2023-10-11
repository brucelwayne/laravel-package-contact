<?php

namespace Brucelwayne\Contact;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider
{

    protected string $module_name = 'contact';

    public function register(): void
    {

    }

    public function boot(): void
    {

        $this->bootConfigs();
        $this->bootRoutes();
        $this->bootMigrations();
        $this->bootComponentNamespace();
        $this->loadBladeViews();

    }

    protected function loadBladeViews(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', $this->module_name);
    }

    protected function bootComponentNamespace(): void
    {
        Blade::componentNamespace('Brucelwayne\\Blog\\View\\Components', $this->module_name);
    }

    protected function bootConfigs(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/contact.php', $this->module_name
        );
    }

    protected function bootRoutes(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }

    protected function bootMigrations(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

}

