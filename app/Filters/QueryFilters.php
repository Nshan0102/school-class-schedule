<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

/**
 * Class QueryFilters
 * @package App\Filters
 * @property $request
 * @property $builder
 */
class QueryFilters
{
    protected $request;
    protected $builder;

    /**
     * QueryFilters constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function apply(Builder $builder): Builder
    {
        $this->builder = $builder;
        foreach ($this->filters() as $name => $value) {
            if (!method_exists($this, $name)) {
                continue;
            }
            if (!is_array($value) && strlen($value)) {
                if (!empty($value && strlen($value))) {
                    $this->$name($value);
                } else {
                    $this->$name();
                }
            } elseif (is_array($value) && !empty($value)) {
                $this->$name($value);
            }
        }
        return $this->builder;
    }

    /**
     * @return array
     */
    public function filters(): array
    {
        return $this->request->all();
    }
}
