<?php

namespace App\Queries;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class QueryBuilderCategories implements QueryBuilder
{

    public function getBuilder(): Builder
    {
        return Category::query();
    }

    public function getCategories(): LengthAwarePaginator
    {
        return Category::paginate(10);
    }

    public function getCategoryById(int $id)
    {
        return Category::select(['id', 'title', 'description', 'created_at'])
            ->findOrFail($id);
    }
}
