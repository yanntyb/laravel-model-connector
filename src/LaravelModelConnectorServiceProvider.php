<?php

namespace Yanntyb\LaravelModelConnector;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
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
            ->hasInstallCommand(function(InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->askToRunMigrations()
                    ->copyAndRegisterServiceProviderInApp()
                    ->endWith(function(InstallCommand $command) {
                        $command->info('Have a great day!');
                    });
            });
    }

    public function boot()
    {
        Gate::define('access-model', function (Model $model) {
            return $model->connector->canBeAccessed();
        });
    }
}
