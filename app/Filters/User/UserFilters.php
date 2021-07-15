<?php

namespace App\Filters\User;

use App\Filters\QueryFilters;

class UserFilters extends QueryFilters
{
    public function name($term)
    {
        return $this->builder->where('name', 'LIKE', "%$term%");
    }

    public function id($term)
    {
        return $this->builder->where('id', '=', "$term");
    }

    public function email($term)
    {
        return $this->builder->where('email', 'LIKE', "%$term%");
    }

    public function sort_name($type = 'desc')
    {
        return $this->builder->orderBy('name', $type);
    }

    public function sort_id($type = 'desc')
    {
        return $this->builder->orderBy('id', $type);
    }

    public function sort_email($type = 'desc')
    {
        return $this->builder->orderBy('email', $type);
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
