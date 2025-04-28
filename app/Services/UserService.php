<?php
namespace App\Services;
use App\Http\Resources\UserResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository;

class UserService
{

    public function __construct(UserRepository $repository) {
        $this->repository = $repository;
    }

    public function register(FormRequest $request)
    {
        $data =  [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        return (new UserResource($this->repository->create($data)))->toArray(request());
    }

}
