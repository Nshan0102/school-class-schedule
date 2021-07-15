<?php

namespace App\Http\Requests\Schedule;

use App\Http\Requests\BaseRequest;
use App\Models\Schedule;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Validation\Rule;

class ScheduleStoreRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->access("store", Schedule::class);
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules(): array
    {
        return [
            "user_id" => "required|integer|exists:users,id",
            "school_class_id" => "required|integer|exists:school_classes,id",
            "day" => "required|date",
            "start_time" => "required|date|after_or_equal:day",
            "end_time" => "required|date|after:start_time",
        ];
    }

    public function messages()
    {
        return [
            "start_time.required" => "Start time should be a dateTime between start of the day and end of the day",
        ];
    }

    public function prepareForValidation()
    {
        $teacher = User::where("id", $this->get("user_id"))->firstOrFail();
        if (!in_array("teacher", $teacher->roles()->pluck("name")->toArray())){
            $this->merge(
                [
                    "user_id" => null,
                ]
            );
        }
        $startDateTime = $this->get("day") . " " . $this->get("start_time") . ":00";
        $endDateTime = $this->get("day") . " " . $this->get("end_time") . ":00";
        $this->merge(
            [
                "day" => $this->formatDateCarbon($startDateTime),
                "start_time" => $this->formatDateCarbon($startDateTime),
                "end_time" => $this->formatDateCarbon($endDateTime),
            ]
        );
    }

    /**
     * @param string $dateString
     * @return Carbon|false|null
     */
    private function formatDateCarbon(string $dateString)
    {
        if (DateTime::createFromFormat('Y-m-d H:i:s', $dateString) !== false) {
            return Carbon::createFromFormat("Y-m-d H:i:s", $dateString);
        }
        return null;
    }
}
