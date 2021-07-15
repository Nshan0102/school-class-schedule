<?php

namespace App\Http\Requests\Schedule;

use App\Http\Requests\BaseRequest;
use App\Models\Schedule;

class ScheduleDestroyRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->access("schedule.destroy", Schedule::class);
    }
}
