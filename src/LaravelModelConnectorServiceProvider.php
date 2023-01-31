<?php

namespace Yanntyb\LaravelModelConnector;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Yanntyb\LaravelModelConnector\Commands\LaravelModelConnectorCommand;

class LaravelModelConnectorServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-model-connector')
            ->hasConfigFile('model-connector')
            ->hasViews()
            ->hasMigration('create_model_connector_table')
            ->hasCommand(LaravelModelConnectorCommand::class)
            ->runsMigrations()
        ;
    }

    public function boot()
    {
        Gate::define('access-file', function (Model $model) {
            return $model->connector->canBeAccessed();
        });
    }
}
