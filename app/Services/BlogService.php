<?php

namespace App\Services;

use App\Http\Resources\BlogResource;
use App\Repositories\BlogRepository;
use Illuminate\Foundation\Http\FormRequest;

class BlogService
{
    public function __construct(protected BlogRepository $repository){}

    public function list()
    {
        return BlogResource::collection($this->repository->list())->toArray(request());
    }

    public function create(FormRequest $request)
    {
        return (new BlogResource($this->repository->create($request->validated())))->toArray(request());
    }

    public function find($id)
    {
        return (new BlogResource($this->repository->find($id)))->toArray(request());
    }

}
