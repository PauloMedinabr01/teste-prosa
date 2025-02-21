<?php

namespace App\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use RuntimeException;

/**
 * Interface AbstractRepositoryInterface
 * @package App\Interfaces
 */
interface AbstractRepositoryInterface
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
     * @return Model
     * @throws RuntimeException
     */
    public function create(array $data): Model;

    /**
     * Atualiza um registro com base no ID.
     * @param array $data
     * @param string $id
     * @return Model
     * @throws RuntimeException
     */
    public function update(array $data, string $id): Model;

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
     * @return Model
     * @throws RuntimeException
     */
    public function show(string $id): Model;
}
