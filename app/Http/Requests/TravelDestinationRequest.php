<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TravelDestinationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3',
            'destination' => 'required|min:3',
            'departure_time' => 'required|date',
            'quota' => 'required|numeric',
            'ticket_price' => 'required|numeric',
        ];
    }

    /**
     * prepare for validation
     */
    protected function prepareForValidation()
    {
        $depertureTime = empty($this->departure_time) ? null : date('Y-m-d H:i:s', strtotime($this->departure_time));
        $this->merge([
            'quota' => (int) $this->quota,
            'ticket_price' => (int) $this->ticket_price,
            'departure_time' => $depertureTime,
        ]);
    }
}
