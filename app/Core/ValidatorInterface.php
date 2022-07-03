<?php

namespace App\Core;

interface ValidatorInterface
{
    /**
     * Checks the correctness of the entered data
     *
     * @param array $data
     * @return array
     */
    public static function run(array $data): array;
}