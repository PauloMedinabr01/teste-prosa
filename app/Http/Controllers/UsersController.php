<?php

namespace App\Http\Controllers;

use App\Models\User;
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
    /**
     * Retorna a view com todos os usuários.
     * @return View
     */
    public function index(): View
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Retorna a view para mostrar um usuário.
     * @param string $id
     * @return View
     * @throws Exception
     */
    public function show(string $id): View
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Cria um novo usuário.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->all();
        User::create($data);
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
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Atualiza um usuário.
     * @param Request $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $data = $request->all();
        $user = User::findOrFail($id);
        $user->update($data);
        return redirect()->route('users.index');
    }

    /**
     * @param string $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(string $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
