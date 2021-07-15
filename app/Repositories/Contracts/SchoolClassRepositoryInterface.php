<?php

namespace App\Repositories\Contracts;

interface SchoolClassRepositoryInterface
{
    public function all();

    public function getById(int $id);

    public function create(array $data);

    public function update(int $id, array $data);
}
