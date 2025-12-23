<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\RegisterUserRequest;
use App\Http\Requests\User\UpdatePasswordUserRequest;
use App\Http\Requests\User\UpdatePhotoUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\UserAccountResource;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\ImageUploadService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $userResource = new UserAccountResource(
            $this->userRepository->find(Auth::user()->id));

        return view('user.account', [
            'user' => $userResource->toArray(request())
        ]);
    }

    public function update(UpdateUserRequest $request)
    {
        $userId = Auth::user()->id;
        if (!$this->userRepository->update($userId, $request->validated()))
            {
                return redirect()->back()->withErrors(['Erro ao atualizar usuário.']);
            };

        return redirect()->back()->with('success', 'Dados atualizados com sucesso.');
    }

    public function updatePassword(UpdatePasswordUserRequest $request)
    {
        $userId = Auth::user()->id;
        $password = [
            'password' => Hash::make($request->password)
        ];
        if (!$this->userRepository->update($userId, $password))
            {
                return redirect()->back()->withErrors(['Erro ao alterar a senha']);
            };

        return redirect()->route('login.logout');
    }

    public function updatePhoto(UpdatePhotoUserRequest $request)
    {
        $imageUploadService = new ImageUploadService('public');

        $filename = $imageUploadService->upload(
            $request->file('photo'), 
            env('USER_DIR_PROFILE_UPLOAD')
        );

        $form = [
            'photo' => $filename
        ];

        $currentPhoto = Auth::user()->photo;

        $userID = Auth::user()->id;

        if (!$this->userRepository->update($userID, $form)) {
            return redirect()->back()->withErrors([
                'Houve um erro ao tentar alterar a imagem do usuário. Por favor, tente novamente.'
            ]);
        }

        $imageUploadService->delete($currentPhoto, env('USER_DIR_PROFILE_UPLOAD'));

        return redirect()->back()->with('success', 'Imagem do usuário alterado com sucesso!');
    }
}
