<?php

namespace App\Repositories\User;

use App\Models\User;

interface UserRepositoryInterface
{
    // en caso de error quitar el tipo de retorno
    // public function model(?string $slug = null): User;
    public function model(?string $slug = null): User;

    public function paginate(array $count = [], array $relations = [], int $perPage = 10);

    public function create(array $data);

    public function update(array $data, User $user);

    public function delete(User $user);
}
