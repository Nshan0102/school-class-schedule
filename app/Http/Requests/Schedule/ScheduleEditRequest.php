<?php

namespace App\Http\Requests\Schedule;

use App\Http\Requests\BaseRequest;
use App\Models\Schedule;

class ScheduleEditRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->access("schedule.edit", Schedule::class);
    }
}
