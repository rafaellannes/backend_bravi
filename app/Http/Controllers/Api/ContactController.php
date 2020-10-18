<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ContactRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $contactRepository;
    protected $userRepository;
    public function __construct(
        ContactRepositoryInterface $contactRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->contactRepository = $contactRepository;
        $this->userRepository = $userRepository;
    }
    public function getContactByUser($id)
    {
        return $this->contactRepository->getContactByUser($id);
    }

    public function getContact($id)
    {
        return $this->contactRepository->getContact($id);
    }

    public function storeContactByUser(Request $request)
    {
        return $this->contactRepository->storeContactByUser($request->all());
    }

    public function updateContact($id, Request $request)
    {
        return $this->contactRepository->updateContact($id, $request->all());
    }

    public function destroyContact($id)
    {
        return $this->contactRepository->destroyContact($id);
    }
}
