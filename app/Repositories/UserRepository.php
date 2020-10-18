<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    protected $entity;
    public function __construct(User $user)
    {
        $this->entity = $user;
    }
    public function getAllUsers()
    {
        return $this->entity->with('contacts')->paginate();
        //return $this->entity->paginate();
    }

    public function getUser($id)
    {
        return $this->entity->findOrFail($id);
    }

    public function storeUser($data)
    {

        $user = $this->entity->create($data);

        /*  foreach ($data['contacts'] as $contact) {
            $user->contacts()->save(new Contact($contact));
        } */

        return $user;
    }

    public function updateUser($id, $data)
    {
        $user = $this->entity->findOrFail($id);

        if ($user) {
            $user->update($data);
            return $user;
        }
    }

    public function destroyUser($id)
    {

        $user = $this->entity->findOrFail($id);

        if ($user) {
            $user->delete();
            return ['message' => "User {$user->id} - {$user->name} deleted"];
        }
    }
}
