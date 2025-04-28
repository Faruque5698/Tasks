<?php

namespace App\Services;

use App\Http\Resources\TaskResource;
use App\Repositories\TaskRepository;
use Illuminate\Foundation\Http\FormRequest;

class TaskService
{
    public function __construct(protected TaskRepository $repository){}

    public function list($is_completed = false)
    {
        return TaskResource::collection($this->repository->list($is_completed))->toArray(request());
    }

    public function create(FormRequest $request)
    {
        $data = $request->validated();
        $data['is_completed'] = false;
        return (new TaskResource($this->repository->create($data)))->toArray(request());
    }

    public function isCompletedUpdate($data,$id)
    {
        return (new TaskResource($this->repository->isCompletedUpdate($data,$id)))->toArray(request());
    }
}
