<?php

namespace App\Http\Controllers;

use App\Services\Cliente\ClienteService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Class ClientesController
 * @package App\Http\Controllers
 */
class ClientesController extends Controller
{
    /** @var ClienteService */
    private ClienteService $clienteService;

    /**
     * UserController constructor.
     * @param ClienteService $clienteService
     */
    public function __construct(ClienteService $clienteService)
    {
        $this->clienteService = $clienteService;
    }

    /**
     * Retorna a view com todos os clientes.
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $search = (string)$request->input('search', '');
        $clientes = $this->clienteService->obterTodosClientes($search);
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Cria um novo cliente.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->all();
        $this->clienteService->criarCliente($data);
        return redirect()->route('clientes.index')->with('success', 'Cliente criado com sucesso!');
    }

    /**
     * Retorna a view para criar um novo cliente.
     * @return View
     * @throws Exception
     */
    public function create(): View
    {
        return view('clientes.create');
    }

    /**
     * Retorna a view para editar um cliente.
     * @param string $id
     * @return View|RedirectResponse
     * @throws Exception
     */
    public function edit(string $id): View|RedirectResponse
    {
        $cliente = $this->clienteService->obterCliente($id);
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Atualiza um cliente.
     * @param Request $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $data = $request->all();
        $this->clienteService->atualizarCliente($data, $id);
        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso!');
    }

    /**
     * Deleta um cliente.
     * @param string $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(string $id): RedirectResponse
    {
        $this->clienteService->deletarCliente($id);
        return redirect()->route('clientes.index')->with('success', 'Cliente deletado com sucesso!');
    }
}
