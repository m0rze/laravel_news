<?php
namespace App\Queries;

use Illuminate\Database\Eloquent\Builder;

interface QueryBuilder {
    public function getBuilder(): Builder;
}
