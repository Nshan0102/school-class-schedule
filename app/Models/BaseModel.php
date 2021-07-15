<?php

namespace App\Models;

use App\Scopes\OrderDesc;
use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseModel
 * @package App\Models
 * @mixin Builder
 * @method static find(int $id)
 * @method static create(array $attributes = [])
 * @method static firstOrCreate(array $attributes = [], array $values = [])
 */
class BaseModel extends Model
{
    use Filterable;

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new OrderDesc());
    }
}
