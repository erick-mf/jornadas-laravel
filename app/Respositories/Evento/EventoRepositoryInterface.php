<?php

namespace App\Respositories\Evento;

use App\Models\Evento;

interface EventoRepositoryInterface
{
    public function model(?string $slug = null): Evento;

    public function paginate(array $count = [], array $relations = [], int $perPage = 10);

    public function create(array $data);

    public function update(array $data, Evento $evento);

    public function delete(Evento $evento);
}
