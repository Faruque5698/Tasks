<?php
namespace App\Repositories;
use App\Models\User;

class UserRepository
{
    public function __construct(protected User $model) {}


    public function create(array $data)
    {
        return $this->model::create($data);
    }

}
