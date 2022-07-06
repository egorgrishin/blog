<?php

namespace App\Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Requests\RegisterRequest;
use App\Modules\User\Controllers\UserController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    private $c;

    public function __construct($c = new UserController())
    {

    }
    /**
     * Register new user
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $data = $request->validated();

        $userController->store($data);
        return response()->json([
            'status'  => true,
            'message' => 'Регистрация прошла успешно',
        ]);
    }

    /**
     * Login
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        $data = $request->all();
        $status = false;

        if (Auth::attempt($data)) {
            $status = true;
        }

        return response()->json([
            'status'  => $status,
            'message' => $status
                ? 'Вы успешно авторизированы'
                : 'Ошибка. Некорректные данные',
        ]);
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

    /**
     * Checks user to auth
     *
     * @return JsonResponse
     */
    public function check(): JsonResponse
    {
        return response()->json([
            'status' => Auth::check(),
        ]);
    }
}
