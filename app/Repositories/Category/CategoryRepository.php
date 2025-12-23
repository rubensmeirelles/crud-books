<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function create(array $data): bool
    {
        $category = new Category();
        $category->name = $data['name'];
        $category->slug = $data['slug'];

        return $category->save();
    }

    public function getAll(): Collection
    {
        return Category::all();
    }

   
}