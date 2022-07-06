<?php

namespace App\Modules\User\Controllers;

use App\Modules\User\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    private UserRepository $repository;

    /**
     * UserController constructor
     */
    public function __construct()
    {
        $this->repository = new UserRepository();
    }

    /**
     * Creates a new user
     *
     * @param array $data
     * @return void
     */
    public function store(array $data): void
    {
        $data['password'] = Hash::make($data['password']);
        $this->repository->store($data);
    }

    /**
     * Checks the email is busy
     *
     * @param string $email
     * @return bool
     */
    public function isBusyEmail(string $email): bool
    {
        return $this->repository->isBusyEmail($email);
    }
}
