<?php

namespace App\Interfaces;

use App\Models\Cliente;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use RuntimeException;

/**
 * Class ClienteRepositoryInterface
 * @package App\Http\Controllers
 */
interface ClienteRepositoryInterface
{
    /**
     * Retorna todos os registros paginados.
     * @param string $search
     * @return LengthAwarePaginator
     * @throws RuntimeException
     */
    public function all(string $search): LengthAwarePaginator;

    /**
     * Cria um novo registro.
     * @param array $data
     * @return Cliente
     * @throws RuntimeException
     */
    public function create(array $data): Cliente;

    /**
     * Atualiza um registro com base no ID.
     * @param array $data
     * @param string $id
     * @return Cliente
     * @throws RuntimeException
     */
    public function update(array $data, string $id): Cliente;

    /**
     * Deleta um registro com base no ID.
     * @param string $id
     * @return bool
     * @throws RuntimeException
     */
    public function delete(string $id): bool;

    /**
     * Retorna um registro com base no ID.
     * @param string $id
     * @return Cliente
     * @throws RuntimeException
     */
    public function show(string $id): Cliente;
}
