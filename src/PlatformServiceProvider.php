<?php

namespace Hito\Platform;

use Hito\Core\BaseServiceProvider;
use Hito\Core\Database\Enums\SeederType;
use Hito\Core\Database\Facades\DatabaseSeeder;
use Hito\Platform\Providers\TranslationServiceProvider;
use Hito\Platform\Providers\ViewServiceProvider;
use Illuminate\Support\Facades\Blade;

use Hito\Platform\Providers\AppServiceProvider;
use Hito\Platform\Providers\AuthServiceProvider;
use Hito\Platform\Providers\BroadcastServiceProvider;
use Hito\Platform\Providers\EventServiceProvider;
use Hito\Platform\Providers\RouteServiceProvider;

class PlatformServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        app()->register(AppServiceProvider::class);
        app()->register(AuthServiceProvider::class);
        app()->register(BroadcastServiceProvider::class);
        app()->register(EventServiceProvider::class);
        app()->register(RouteServiceProvider::class);
        app()->register(TranslationServiceProvider::class);
        app()->register(ViewServiceProvider::class);
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'hito');
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'hito');
        $this->registerDatabaseSeeders();
        $this->loadConfig();

        Blade::componentNamespace('Hito\\Platform\\View\\Components', 'hito');

        $this->registerAssetDirectory('public', 'platform');
    }

    protected function loadConfig()
    {
        $files = [];

        foreach ($files as $key) {
            $this->mergeConfigFrom(__DIR__. "/../config/{$key}.php", $key);
        }
    }

    protected function registerDatabaseSeeders(): void
    {
        DatabaseSeeder::register(\Hito\Platform\Database\Seeders\DatabaseSeeder::class, SeederType::MAIN);
        DatabaseSeeder::register(\Hito\Platform\Database\Seeders\DemoSeeder::class, SeederType::DEMO);
    }
}
