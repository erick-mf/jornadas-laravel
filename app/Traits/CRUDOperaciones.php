<?php

namespace App\Traits;
use App\Services\UploadService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

trait CRUDOperaciones
{
    public function model(?string $slug = null):Model{
        if($slug){
            return $this->model::whereSlug($slug)->firstOrFail();
        }
        return app($this->model);
    }

    public function paginate(array $count = [], array $relations = [], int $perPage = 10):LengthAwarePaginator{
        return $this->model->query()->with($relations)->withCount($count)->paginate($perPage);
    }

    public function create(array $data):Model {
$image = UploadService::upload(data_get($data, 'imagen'), strtolower(class_basename($this->model)));
    }

    public function update(array $data, Model $model);

    public function delete(Model $model);
}
