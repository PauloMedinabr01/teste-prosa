<?php

namespace App\Repository;

use App\Interfaces\AbstractRepositoryInterface;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

/**
 * Class AbstractRepository
 * @package App\Http\Controllers
 */
abstract class AbstractRepository implements AbstractRepositoryInterface
{
    /** @var Model */
    protected Model $model;

    /**
     * AbstractRepository constructor.
     * Inicializa o modelo com a instância concreta.
     * @throws BindingResolutionException
     */
    public function __construct()
    {
        $this->model = App::make($this->obterModel());
    }

    /**
     * Retorna a classe do modelo a ser carregado.
     *
     * @return string
     */
    abstract protected function obterModel(): string;

    /**
     * @inheritDoc
     */
    abstract public function all(string $search): LengthAwarePaginator;

    /**
     * @inheritDoc
     */
    abstract public function create(array $data): Model;

    /**
     * @inheritDoc
     */
    abstract public function update(array $data, string $id): Model;

    /**
     * @inheritDoc
     */
    abstract public function delete(string $id): bool;

    /**
     * @inheritDoc
     */
    abstract public function show(string $id): Model;

    /**
     * @param Builder $query
     * @param string $search
     * @return Builder
     */
    abstract protected function addFilters(Builder $query, string $search): Builder;
}
