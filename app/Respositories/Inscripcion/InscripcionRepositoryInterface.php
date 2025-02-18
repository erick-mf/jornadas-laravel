<?php

namespace App\Respositories\Inscripcion;

use App\Models\Inscripcion;

interface InscripcionRepositoryInterface
{
    public function model(?string $slug = null): Inscripcion;

    public function paginate(array $count = [], array $relations = [], int $perPage = 10);

    public function create(array $data);

    public function update(array $data, Inscripcion $inscripcion);

    public function delete(Inscripcion $inscripcion);
}
