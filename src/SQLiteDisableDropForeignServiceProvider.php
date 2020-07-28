<?php

namespace Esign\SQLiteDisableDropForeign;

use Esign\SQLiteDisableDropForeign\Database\ExtendedSQLiteConnection;
use Illuminate\Database\Connection;
use Illuminate\Support\ServiceProvider;

class SQLiteDisableDropForeignServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([$this->configPath() => config_path('sqlite-disable-drop-foreign.php')], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom($this->configPath(), 'sqlite-disable-drop-foreign');

        foreach (config('sqlite-disable-drop-foreign.connections') as $connectionName) {
            Connection::resolverFor($connectionName, function ($connection, $database, $prefix, $config) {
                return new ExtendedSQLiteConnection($connection, $database, $prefix, $config);
            });
        }
    }

    protected function configPath(): string
    {
        return __DIR__ . '/../config/sqlite-disable-drop-foreign.php';
    }
}