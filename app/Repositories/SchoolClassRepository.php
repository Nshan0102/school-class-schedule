<?php

namespace App\Repositories;

use App\Filters\QueryFilters;
use App\Filters\User\SchoolClassFilters;
use App\Models\SchoolClass;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Class SchoolClassRepository
 * @mixin Model
 * @package App\Repositories
 */
class SchoolClassRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @var QueryFilters
     */
    protected $filter;

    /**
     * @var Request
     */
    protected $request;

    public function __construct(Request $request, SchoolClass $model, SchoolClassFilters $filters)
    {
        $this->request = $request;
        $this->model = $model;
        $this->filter = $filters;
    }

    public function all()
    {
        return $this->mainQuery()->filter($this->filter)->paginate($this->per_page());
    }

    public function create($data)
    {
        return $this->model::create($data);
    }

    public function update($id, $data)
    {
        $this->model->update($data);
        return $this->model;
    }

    public function getById($id)
    {
        return $this->getByIdModel($id)->firstOrFail();
    }

    public function getByIdModel($id): Builder
    {
        return $this->mainQuery()->where('id', $id);
    }

    public function newQuery(): Builder
    {
        return $this->model::query();
    }
}
