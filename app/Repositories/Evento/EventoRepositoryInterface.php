<?php

namespace App\Repositories\Evento;

use App\Models\Evento;

interface EventoRepositoryInterface
{
    public function model(?string $slug = null);

    public function paginate(array $count = [], array $relations = [], int $perPage = 10);

    public function create(array $data);

    public function update(array $data, Evento $evento);

    public function delete(Evento $evento);
}
