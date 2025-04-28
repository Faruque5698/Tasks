<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskIsCompletedRequest;
use App\Http\Requests\TaskRequest;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(protected TaskService $service){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->service->list('false');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        return $this->service->create($request);
    }

    /**
     * Update is_completed for task.
     */
    public function isCompletedUpdate(TaskIsCompletedRequest $request, $id)
    {
        return $this->service->isCompletedUpdate($request->is_completed,$id);
    }
}
