<?php

namespace App\Interfaces;

use App\Models\Cliente;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class ClienteServiceInterface
 * @package App\Http\Controllers
 */
interface ClienteServiceInterface
{
    /**
     * Lista todos os registros.
     * @param string $search
     * @return LengthAwarePaginator
     */
    public function obterTodosClientes(string $search): LengthAwarePaginator;

    /**
     * Cria um novo registro.
     * @param array $data
     * @return Cliente
     */
    public function criarCliente(array $data): Cliente;

    /**
     * Atualiza um registro.
     * @param array $data
     * @param string $id
     * @return Cliente
     */
    public function atualizarCliente(array $data, string $id): Cliente;

    /**
     * Busca um registro pelo ID.
     * @param string $id
     * @return Cliente
     */
    public function obterCliente(string $id): Cliente;

    /**
     * Deleta um registro.
     * @param string $id
     * @return bool
     */
    public function deletarCliente(string $id): bool;
}
