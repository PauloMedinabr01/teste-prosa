<?php

namespace App\Interfaces;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Interface UserServiceInterface
 * @package App\Interfaces
 */
interface UserServiceInterface
{
    /**
     * Lista todos os registros.
     * @param string $search
     * @return LengthAwarePaginator
     */
    public function obterTodosUsuarios(string $search): LengthAwarePaginator;

    /**
     * Cria um novo registro.
     * @param array $data
     * @return User
     */
    public function criarUsuario(array $data): User;

    /**
     * Atualiza um registro.
     * @param array $data
     * @param string $id
     * @return User
     */
    public function atualizarUsuario(array $data, string $id): User;

    /**
     * Busca um registro pelo ID.
     * @param string $id
     * @return User
     */
    public function obterUsuario(string $id): User;

    /**
     * Deleta um registro.
     * @param string $id
     * @return bool
     */
    public function deletarUsuario(string $id): bool;
}
