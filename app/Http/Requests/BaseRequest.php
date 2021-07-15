<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{
    /**
     * @param $ability
     * @param array|mixed $arguments
     * @return bool
     */
    public function access($ability, $arguments = []): bool
    {
        [$ability, $arguments] = $this->parseAbilityAndArguments($ability, $arguments);
        return (bool)app(Gate::class)->authorize($ability, $arguments);
    }

    /**
     * @param $ability
     * @param $arguments
     * @return array
     */
    protected function parseAbilityAndArguments($ability, $arguments): array
    {
        if (is_string($ability)) {
            return [$ability, $arguments];
        }
        return [debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 3)[2]['function'], $ability];
    }

    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules(): array
    {
        return [];
    }

    /**
     * @param $paramName
     * @return mixed
     */
    public function getRouteParam($paramName)
    {
        return $this->route()->parameters[$paramName] ?? null;
    }
}
