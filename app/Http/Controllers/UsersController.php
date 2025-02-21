<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Services\User\UserService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Class UsersController
 * @package App\Http\Controllers
 */
class UsersController extends Controller
{
    /** @var UserService $userService */
    private UserService $userService;

    /**
     * UserController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Retorna a view com todos os usuários.
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $search = (string)$request->input('search', '');
        $users = $this->userService->obterTodosUsuarios($search);
        return view('users.index', compact('users'));
    }

    /**
     * Cria um novo usuário.
     * @param StoreUserRequest $storeUserRequest
     * @return RedirectResponse
     */
    public function store(StoreUserRequest $storeUserRequest): RedirectResponse
    {
        $data = $storeUserRequest->validated();
        $this->userService->criarUsuario($data);
        return redirect()->route('users.index');
    }

    /**
     * Retorna a view para criar um novo usuário.
     * @return View
     * @throws Exception
     */
    public function create(): View
    {
        return view('users.create');
    }

    /**
     * Retorna a view para editar um usuário.
     * @param string $id
     * @return View|RedirectResponse
     * @throws Exception
     */
    public function edit(string $id): View|RedirectResponse
    {
        $user = $this->userService->obterUsuario($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Atualiza um usuário.
     * @param UpdateUserRequest $updateUserRequest
     * @param string $id
     * @return RedirectResponse
     */
    public function update(UpdateUserRequest $updateUserRequest, string $id): RedirectResponse
    {
        $data = $updateUserRequest->validated();
        $this->userService->atualizarUsuario($data, $id);
        return redirect()->route('users.index');
    }

    /**
     * Deleta um usuário.
     * @param string $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(string $id): RedirectResponse
    {
        $this->userService->deletarUsuario($id);
        return redirect()->route('users.index');
    }
}
