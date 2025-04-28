<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Services\UserService; // Import the UserService class



class UserController extends Controller
{
    public function __construct(protected UserService $service){}

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        return $this->service->register($request);

    }

}
