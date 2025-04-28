<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Services\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct(protected BlogService $service){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->service->list();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        return $this->service->create($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->service->find($id);
    }

}
