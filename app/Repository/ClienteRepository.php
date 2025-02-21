<?php

namespace App\Repository;

use App\Interfaces\ClienteRepositoryInterface;
use App\Models\Cliente;
use Exception;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use RuntimeException;

/**
 * Class ClienteRepository
 * @package App\Repository
 */
class ClienteRepository extends AbstractRepository implements ClienteRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @inheritDoc
     */
    public function all(string $search): LengthAwarePaginator
    {
        try {
            return $this->model::query()
                ->select('id', 'name', 'email', 'created_at', 'updated_at', 'telephone', 'zip_code', 'address')
                ->where(function ($query) use ($search) {
                    self::addFilters($query, $search);
                })
                ->paginate(10)
                ->appends(['search' => $search]);
        } catch (Exception $e) {
            throw new RuntimeException($e->getMessage());
        }
    }

    /**
     * @inheritDoc
     */
    protected function addFilters(Builder $query, string $search): Builder
    {
        $query->where(function ($query) use ($search) {
            $query->where('id', 'like', "%$search%")
                ->orWhere('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('zip_code', 'like', "%$search%");
        });

        return $query;
    }

    /**
     * @inheritDoc
     */
    public function create(array $data): Cliente
    {
        try {
            return $this->model::create($data);
        } catch (Exception $e) {
            throw new RuntimeException($e->getMessage());
        }
    }

    /**
     * @inheritDoc
     */
    public function update(array $data, string $id): Cliente
    {
        try {
            $user = $this->model::findOrFail($id);
            $user->update($data);
            return $user;
        } catch (Exception $e) {
            throw new RuntimeException($e->getMessage());
        }
    }

    /**
     * @inheritDoc
     */
    public function delete(string $id): bool
    {
        try {
            $user = $this->model::findOrFail($id);
            $user->save();
            return $user->delete();
        } catch (Exception $e) {
            throw new RuntimeException($e->getMessage());
        }
    }

    /**
     * @inheritDoc
     */
    public function show(string $id): Cliente
    {
        try {
            return $this->model::findOrFail($id);
        } catch (Exception $e) {
            throw new RuntimeException($e->getMessage());
        }
    }

    /**
     * @inheritDoc
     */
    protected function obterModel(): string
    {
        return Cliente::class;
    }
}
