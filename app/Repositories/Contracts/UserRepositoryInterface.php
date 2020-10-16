<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface
{
    public function getAllUsers();
    public function storeUser($data);
    public function updateUser($id, $data);
    public function destroyUser($id);
}
