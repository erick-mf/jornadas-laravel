<?php

namespace App\Repositories\Inscripcion;

use App\Models\Inscripcion;

interface InscripcionRepositoryInterface
{
    public function model(?string $slug = null);

    public function paginate(array $count = [], array $relations = [], int $perPage = 10);

    public function create(array $data);

    public function update(array $data, Inscripcion $inscripcion);

    public function delete(Inscripcion $inscripcion);
}
