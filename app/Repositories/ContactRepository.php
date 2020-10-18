<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Models\User;
use App\Repositories\Contracts\ContactRepositoryInterface;

class ContactRepository implements ContactRepositoryInterface
{
    protected $entity;
    protected $userEntity;

    public function __construct(Contact $contact, User $user)
    {
        $this->entity = $contact;
        $this->userEntity = $user;
    }

    public function getContactByUser($idUser)
    {
        /*  return $this->entity->where('user_id', $idUser)->get(); */
        return $this->userEntity->with('contacts')->where('id', $idUser)->get();
    }

    public function storeContactByUser($data)
    {
        return $this->entity->create($data);
    }

    public function getContact($id)
    {
        return $this->entity->findOrFail($id);
    }

    public function updateContact($id, $data)
    {
        $contact = $this->entity->findOrFail($id);

        if ($contact) {
            $contact->update($data);
            return $contact;
        }
    }

    public function destroyContact($id)
    {
        $contact = $this->entity->findOrFail($id);

        if ($contact) {
            $contact->delete();
            return ['message' => "User {$contact->type} - {$contact->value} deleted"];
        }
    }
}
