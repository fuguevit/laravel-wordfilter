<?php

namespace Fuguevit\WordFilter\Providers;

use Illuminate\Support\ServiceProvider;

class WordFilterServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        $this->publishes([
            realpath(__DIR__.'/../../database/migrations/') => database_path('migrations'),
        ], 'migrations');

        $this->publishes([
            realpath(__DIR__.'/../../config/word.filter.php') => config_path('word.filter.php'),
        ], 'config');
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $this->mergeConfigFrom(realpath(__DIR__.'/../../config/word.filter.php'), 'word.filter');
    }
}
