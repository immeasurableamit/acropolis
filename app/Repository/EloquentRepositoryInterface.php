<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Interface EloquentRepositoryInterface
 * @package App\Repositories
 */
interface EloquentRepositoryInterface
{
    /**
     * @return Collection
     */
    public function all(): ?Collection;

    /**
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes): Model;

    /**
     * @param array $attributes
     *
     * @return bool
     */
    public function insert(array $attributes): bool;

    /**
     * @param array $attributes
     * @param int $id
     * @return Model
     */
    public function update(array $attributes, int $id): Model;

    /**
     * @param $id
     * @return Model
     */
    public function find($id): ?Model;

    /**
     * @param $id
     * @return bool
     */
    public function delete($id): ?bool;

    /**
     * Destroy the models for the given IDs.
     *
     * @param Collection|array|int  $ids
     * @return int
     */
    public function destroy(array $ids): int;

    /**
     * @param array $conditions
     * @param array $attributes
     * @return Model
     */
    public function updateOrCreate(array $conditions, array $attributes): Model;
}
