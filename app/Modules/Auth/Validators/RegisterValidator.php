<?php

namespace App\Modules\Auth\Validators;

use App\Core\ValidatorInterface;

class RegisterValidator implements ValidatorInterface
{
    /**
     * Сhecks the correctness of the data for registration
     *
     * @param array $data
     * @return array
     */
    public static function run(array $data): array
    {
        return ['status' => false, 'message' => 'test'];
    }

    /**
     * Returns error message by code
     *
     * @param int|null $code
     * @return string
     */
    public static function getResponse(?int $code): array
    {

        return '';
    }
}