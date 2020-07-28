<?php

namespace Esign\SQLiteDisableDropForeign\Database\Schema;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Fluent;

class ExtendedBlueprint extends Blueprint
{
    public function dropForeign($index)
    {
        return new Fluent();
    }
}