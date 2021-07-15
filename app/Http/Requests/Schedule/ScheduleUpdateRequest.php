<?php

namespace App\Http\Requests\Schedule;

use App\Models\Schedule;

class ScheduleUpdateRequest extends ScheduleStoreRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->access("schedule.update", Schedule::class);
    }
}
