<?php

namespace App\Repository;

use App\Repository\Contracts\BaseRepositoryContract;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryContract
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
}
