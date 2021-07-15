<?php

namespace App\Filters\User;

use App\Filters\QueryFilters;

class ScheduleFilters extends QueryFilters
{
    public function id($term)
    {
        return $this->builder->where('id', '=', "$term");
    }

    public function sort_id($type = 'desc')
    {
        return $this->builder->orderBy('id', $type);
    }

    public function sort_created($type = 'desc')
    {
        return $this->builder->orderBy('created_at', $type);
    }

    public function created_at_from($term)
    {
        return $this->builder->where('created_at', '>=', "$term");
    }

    public function created_at_to($term)
    {
        return $this->builder->where('created_at', '<=', "$term");
    }
}
