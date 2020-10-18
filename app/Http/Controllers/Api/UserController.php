<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAllUsers()
    {
        return UserResource::collection($this->repository->getAllUsers());
    }

    public function getUser($id)
    {
        return $this->repository->getUser($id);
    }

    public function storeUser(Request $request)
    {
        return $this->repository->storeUser($request->all());
    }

    public function updateUser($id, Request $request)
    {
        return $this->repository->updateUser($id, $request->all());
    }

    public function destroyUser($id)
    {
        return $this->repository->destroyUser($id);
    }
}
