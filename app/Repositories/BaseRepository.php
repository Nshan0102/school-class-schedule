<?php

namespace App\Repositories;

use App\Filters\QueryFilters;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

/**
 * Class BaseRepository
 * @package App\Repositories
 * @property Request $request
 * @property BaseModel $model
 * @property QueryFilters $filter
 */
class BaseRepository
{
    public const PER_PAGE = 10;

    public function all()
    {
        $query = $this->mainQuery();
        if ($this->request->has('all')) {
            return $query->filter($this->filter)->get();
        }
        return $query->filter($this->filter)->paginate($this->per_page());
    }

    protected function mainQuery(): Builder
    {
        return $this->model::query();
    }

    protected function per_page(): int
    {
        return $this->request->has('per_page') && intval($this->request->get('per_page')) != 0
            ? intval($this->request->get('per_page')) : self::PER_PAGE;
    }
}
