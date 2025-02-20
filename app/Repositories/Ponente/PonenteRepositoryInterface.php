<?php

namespace App\Repositories\Ponente;

use App\Models\Ponente;

interface PonenteRepositoryInterface
{
    public function model(?string $slug = null);

    public function paginate(array $count = [], array $relations = [], int $perPage = 10);

    public function create(array $data);

    public function update(array $data, Ponente $ponente);

    public function delete(Ponente $ponente);
}
