<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "school_class_id",
        "day",
        "start_time",
        "end_time",
    ];

    public function teacher()
    {
        return $this->hasOne(User::class, "id", "user_id");
    }

    public function schoolClass()
    {
        return $this->hasOne(SchoolClass::class, "id", "school_class_id");
    }
}
