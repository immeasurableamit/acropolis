<?php

namespace App\Repository\Eloquent;

use App\Repository\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseRepository implements EloquentRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param array $attributes
     *
     * @return Model
     */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    /**
     * @param array $attributes
     *
     * @return bool
     */
    public function insert(array $attributes): bool
    {
        return $this->model->insert($attributes);
    }

    /**
     * @param array $attributes
     * @param int $id
     * @return Model
     */
    public function update(array $attributes, int $id): Model
    {
        $record = $this->model->findOrFail($id);
        $record->update($attributes);

        return $record;
    }

    /**
     * @param $id
     * @return Model
     */
    public function find($id): ?Model
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id): bool
    {
        return $this->model->destroy($id);
    }
    /**
     * Destroy the models for the given IDs.
     *
     * @param Collection|array|int  $ids
     * @return int
     */
    public function destroy(array $ids): int
    {
        return $this->model->destroy($ids);
    }

    /**
     * @param array $conditions
     * @param array $attributes
     * @return Model
     */
    public function updateOrCreate(array $conditions, array $attributes): Model
    {
        return $this->model->updateOrCreate($conditions, $attributes);
    }
}
