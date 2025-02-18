<?php

namespace App\Respositories\User;

use App\Models\User;

interface UserRepositoryInterface
{
    public function model(?string $slug = null): User;

    public function paginate(array $count = [], array $relations = [], int $perPage = 10);

    public function create(array $data);

    public function update(array $data, User $user);

    public function delete(User $user);
}
