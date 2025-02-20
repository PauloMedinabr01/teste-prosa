<?php

namespace App\Services\User;

use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\UserServiceInterface;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class UserService
 * @package App\Http\Controllers
 */
class UserService implements UserServiceInterface
{
    /** @var UserRepositoryInterface */
    private UserRepositoryInterface $userRepository;

    /**
     * UserService constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @inheritDoc
     */
    public function obterTodosUsuarios(string $search = ''): LengthAwarePaginator
    {
        return $this->userRepository->all($search);
    }

    /**
     * @inheritDoc
     */
    public function criarUsuario(array $data): User
    {
        return $this->userRepository->create($data);
    }

    /**
     * @inheritDoc
     */
    public function atualizarUsuario(array $data, string $id): User
    {
        return $this->userRepository->update($data, $id);
    }

    /**
     * @inheritDoc
     */
    public function deletarUsuario(string $id): bool
    {
        return $this->userRepository->delete($id);
    }

    /**
     * @inheritDoc
     */
    public function obterUsuario(string $id): User
    {
        return $this->userRepository->show($id);
    }
}
