<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface CategoryRepositoryInterface
{
    public function create(array $data): bool;
    public function getAll(): Collection;
    // public function find(int $id) : object;
    // public function update(int $id, array $data): bool;
}