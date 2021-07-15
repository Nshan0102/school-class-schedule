<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        "teacher_id",
        "class_id",
        "day",
        "start_time",
        "end_time",
    ];

    public function teacher()
    {
        return $this->hasOne(User::class);
    }

    public function schoolClass()
    {
        return $this->hasOne(SchoolClass::class);
    }
}
