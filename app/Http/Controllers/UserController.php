<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\RegisterUserRequest;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

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

    public function index()
    {
        $userId = Auth::user()->id;

        $user = $this->userRepository->find($userId);

        dd($user);
        return view('user.account', compact('user'));
    }

    public function update()
    {
        $userId = Auth::user()->id;
    }
}
