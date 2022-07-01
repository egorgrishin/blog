<?php

namespace App\Modules\User\Repositories;

use App\Modules\User\Models\User;

class UserRepository
{
    /**
     * User eloquent model
     *
     * @var User
     */
    private User $user;

    /**
     * UserRepository constructor
     */
    public function __construct()
    {
        $this->user = new User();
    }
}