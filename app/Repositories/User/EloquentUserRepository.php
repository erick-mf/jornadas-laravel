<?php

namespace App\Repositories\Use;

use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use App\Traits\CRUDOperaciones;

class EloquentUserRepository implements UserRepositoryInterface
{
    use CRUDOperaciones;

    protected $model = User::class;
}
