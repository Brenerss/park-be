<?php

namespace App\Http\Requests\Parking;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property int box_id
 * @property int vehicle_id
 */
class StoreParkingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'vehicle_id' => 'required|integer|exists:App\Models\Vehicle,id',
            'box_id' => 'required|integer|exists:App\Models\Box,id'
        ];
    }
}
