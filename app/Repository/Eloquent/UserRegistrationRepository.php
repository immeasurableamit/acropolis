<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\UserRegistrationRepositoryInterface;
use Illuminate\Support\Collection;


class UserRegistrationRepository extends BaseRepository implements UserRegistrationRepositoryInterface
{
    /**
     * UserRegistrationRepository constructor.
     *
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * Get users by id
     *
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->model->where('id', $id)->get();
    }
}
