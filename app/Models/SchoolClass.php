<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class SchoolClass extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        "name",
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class, "school_class_id", "id");
    }
}
