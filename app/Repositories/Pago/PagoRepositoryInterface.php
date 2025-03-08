<?php

namespace App\Repositories\Pago;

use App\Models\Pago;

interface PagoRepositoryInterface
{
    public function model(?string $slug = null);

    public function paginate(array $count = [], array $relations = [], int $perPage = 10);

    public function create(array $data);

    public function update(array $data, Pago $pago);

    public function delete(Pago $pago);

    public function totalDePagos();

    public function totalFormateado();
}
