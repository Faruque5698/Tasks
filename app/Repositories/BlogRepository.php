<?php

namespace App\Repositories;

use App\Models\Blog;

class BlogRepository
{
    public function __construct(protected Blog $model)
    {
        $this->model = $model;
    }

    public function list()
    {
        return $this->model::get();
    }

    public function create(array $data)
    {
        return $this->model::create($data);
    }

    public function find($id)
    {
        return $this->model::find($id);
    }


}
