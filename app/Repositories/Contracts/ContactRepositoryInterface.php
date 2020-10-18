<?php

namespace App\Repositories\Contracts;

interface ContactRepositoryInterface
{
    public function getContactByUser($idUser);
    public function storeContactByUser($data);
    public function getContact($id);
    public function updateContact($id, $data);
    public function destroyContact($id);
}
