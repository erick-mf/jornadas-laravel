<?php

namespace App\Traits;

use App\Services\UploadService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;

trait CRUDOperaciones
{
    public function model(?string $slug = null): Model
    {
        if ($slug) {
            return $this->model::whereSlug($slug)->firstOrFail();
        }

        return app($this->model);
    }

    public function paginate(array $count = [], array $relations = [], int $perPage = 10): LengthAwarePaginator
    {
        return $this->model::query()->with($relations)->withCount($count)->orderBy('id', 'desc')->paginate($perPage);
    }

    public function create(array $data): Model
    {
        $data = $this->processImage($data);

        return $this->model::create($data);
    }

    public function update(array $data, Model $model): Model
    {
        $data = $this->processImage($data, $model);
        $model->fill($data);
        $model->update();

        return $model;
    }

    public function delete(Model $model)
    {
        if (method_exists($this, 'deleteCheck')) {
            $this->deleteCheck($model);
        }
        if (isset($model->image) && ! empty($model->image)) {
            UploadService::delete($model->image);
        }

        return $model->delete();
    }

    protected function processImage(array $data, ?Model $model = null): array
    {
        $imageField = 'image';
        $folder = strtolower(class_basename($this->model));

        if (Arr::has($data, $imageField) && $data[$imageField] instanceof \Illuminate\Http\UploadedFile) {
            // Si se proporciona una nueva imagen
            if ($model && $model->$imageField) {
                // Eliminar la imagen anterior si existe
                UploadService::delete($model->$imageField);
            }
            $data[$imageField] = UploadService::upload($data[$imageField], $folder);
        } elseif ($model && $model->$imageField) {
            // Si no se proporciona una nueva imagen, mantener la existente
            $data[$imageField] = $model->$imageField;
        }

        return $data;
    }
}
