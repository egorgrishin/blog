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

    public function show(int $id): array
    {
        return $this->user->find($id)->toArray();
    }

    public function store(array $data): void
    {
        $this->user->create($data);
    }

    public function update(int $id, array $data): void
    {
        $this->user->where('id', $id)->update($data);
    }

    /**
     * Checks the email is busy
     *
     * @param string $email
     * @return bool
     */
    public function isBusyEmail(string $email): bool
    {
        return $this->user->where('email', $email)
                ->count() > 0;
    }
}