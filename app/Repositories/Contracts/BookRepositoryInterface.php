<?php

namespace App\Repositories\Contracts;

interface BookRepositoryInterface
{
    public function create(array $data): bool;
    public function getAllPaginated(int $perPage = 10);
}