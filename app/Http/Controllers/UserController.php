<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\RegisterUserRequest;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserController extends Controller
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(RegisterUserRequest $request)
    {
        $form = $request->validated();

        if (!$this->userRepository->create($form))
        {
            return redirect()->back()->withErrors(['Erro ao cadastrar usuário.']);
        }

        return redirect()->back()->with('success', 'Usuário cadastrado.');
    }
}
