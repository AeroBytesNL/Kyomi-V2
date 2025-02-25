<?php

namespace App\Helpers;

class getLogs
{
    public static function laravel(): array
    {
        return array_reverse(file(storage_path('logs/laravel.log')));
    }

    public static function userError(): array
    {
        return array_reverse(file(storage_path('logs/user_error.log')));
    }
}