<?php

namespace App\Repository;

use Illuminate\Support\Collection;

interface UserRegistrationRepositoryInterface
{
    public function all(): Collection;
}
