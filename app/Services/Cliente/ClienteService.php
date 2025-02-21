<?php

namespace App\Services\Cliente;

use App\Interfaces\ClienteRepositoryInterface;
use App\Interfaces\ClienteServiceInterface;
use App\Models\Cliente;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class ClienteService
 * @package App\Services\Cliente
 */
class ClienteService implements ClienteServiceInterface
{
    /** @var ClienteRepositoryInterface */
    private ClienteRepositoryInterface $clienteRepository;

    /**
     * ClienteService constructor.
     * @param ClienteRepositoryInterface $clienteRepository
     */
    public function __construct(ClienteRepositoryInterface $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    /**
     * @inheritDoc
     */
    public function obterTodosClientes(string $search = ''): LengthAwarePaginator
    {
        return $this->clienteRepository->all($search);
    }

    /**
     * @inheritDoc
     */
    public function criarCliente(array $data): Cliente
    {
        return $this->clienteRepository->create($data);
    }

    /**
     * @inheritDoc
     */
    public function atualizarCliente(array $data, string $id): Cliente
    {
        return $this->clienteRepository->update($data, $id);
    }

    /**
     * @inheritDoc
     */
    public function deletarCliente(string $id): bool
    {
        return $this->clienteRepository->delete($id);
    }

    /**
     * @inheritDoc
     */
    public function obterCliente(string $id): Cliente
    {
        return $this->clienteRepository->show($id);
    }
}
