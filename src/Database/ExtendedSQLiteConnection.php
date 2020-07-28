<?php

namespace Esign\SQLiteDisableDropForeign\Database;

use Esign\SQLiteDisableDropForeign\Database\Schema\ExtendedBlueprint;
use Illuminate\Database\SQLiteConnection;
use Illuminate\Database\Schema\SQLiteBuilder;

class ExtendedSQLiteConnection extends SQLiteConnection
{
    /**
     * Get a schema builder instance for the connection.
     *
     * @return \Illuminate\Database\Schema\SQLiteBuilder
     */
    public function getSchemaBuilder()
    {
        if (is_null($this->schemaGrammar)) {
            $this->useDefaultSchemaGrammar();
        }

        $builder = new SQLiteBuilder($this);
        $builder->blueprintResolver(function ($table, $callback) {
            return new ExtendedBlueprint($table, $callback);
        });

        return $builder;
    }
}