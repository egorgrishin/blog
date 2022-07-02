<?php

namespace App\Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\User\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return array
     */
    public function register(Request $request): array
    {
        $data = $request->all();
        User::create($data);

        return [
            'status'  => true,
            'message' => 'Вы успешно зарегистрированы',
        ];
    }

    /**
     * Login
     *
     * @param Request $request
     * @return array
     */
    public function login(Request $request): array
    {
        $data = $request->all();

        if (Auth::attempt($data)) {
            $success = true;
            $message = 'Вы успешно авторизированы';
        } else {
            $success = false;
            $message = 'Ошибка. Некорректные данные';
        }

        return [
            'success' => $success,
            'message' => $message,
        ];
    }

    /**
     * Logout
     *
     * @return array
     */
    public function logout(): array
    {
        if (!Auth::check()) return [
            'status' => false,
        ];

        Session::flush();

        return [
            'status' => true,
        ];
    }
}
