<?php

namespace App\Repositories;
use App\Models\Task;

class TaskRepository
{
    public function __construct(protected Task $model)
    {
        $this->model = $model;
    }

    public function list($is_completed = false)
    {
        return $this->model::where('is_completed',$is_completed)->get();
    }

    public function create(array $data)
    {
        return $this->model::create($data);
    }

    public function isCompletedUpdate($data,$id)
    {
        $task = $this->model::find($id);
        $task->is_completed = $data;
        $task->save();
        return $task;
    }
}
