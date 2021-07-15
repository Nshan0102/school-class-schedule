<?php

namespace App\Repositories;

use App\Filters\QueryFilters;
use App\Filters\User\ScheduleFilters;
use App\Models\Schedule;
use App\Repositories\Contracts\ScheduleRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Class SchoolClassRepository
 * @mixin Model
 * @package App\Repositories
 */
class ScheduleRepository extends BaseRepository implements ScheduleRepositoryInterface
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

    public function __construct(Request $request, Schedule $model, ScheduleFilters $filters)
    {
        $this->request = $request;
        $this->model = $model;
        $this->filter = $filters;
    }

    public function all($withoutPagination = false)
    {
        $query = $this->mainQuery()->filter($this->filter);
        return $withoutPagination ? $query->get() : $query->paginate($this->per_page());
    }

    public function create($data)
    {
        return $this->model::create($data);
    }

    public function update($id, $data)
    {
        $this->getByIdModel($id)->update($data);
        return $this->model;
    }

    public function getByIdModel($id): Builder
    {
        return $this->mainQuery()->where('id', $id);
    }

    public function getById($id)
    {
        return $this->getByIdModel($id)->firstOrFail();
    }

    public function newQuery(): Builder
    {
        return $this->model::query();
    }

    public function destroy(int $id)
    {
        return $this->getByIdModel($id)->delete();
    }
}
