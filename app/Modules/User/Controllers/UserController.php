<?php

namespace App\Modules\User\Controllers;

use App\Modules\User\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
