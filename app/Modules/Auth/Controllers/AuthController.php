<?php

namespace App\Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Requests\RegisterRequest;
use App\Modules\User\Controllers\UserController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * @var UserController
     */
    private UserController $userController;

    /**
     * AuthController constructor
     *
     * @param UserController $controller
     */
    public function __construct(UserController $controller)
    {
        $this->userController = $controller;
    }

    /**
     * Register new user
     *
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $data = $request->validated();
        $this->userController->store($data);

        Auth::attempt($data);

        return response()->json(['status'  => true]);
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
        return response()->json(['status'  => Auth::attempt($data)]);
    }

    /**
     * Logout
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        if (!Auth::check())
            return response()->json(['status' => false]);
        $request->session()->flush();

        return response()->json(['status' => true]);
    }

    /**
     * Checks user to auth
     *
     * @return JsonResponse
     */
    public function check(): JsonResponse
    {
        return response()->json(['status' => Auth::check()]);
    }
}
