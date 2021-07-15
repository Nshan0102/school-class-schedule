<?php

namespace App\Models;

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
    protected static function boot()
    {
        parent::boot();
    }
}
