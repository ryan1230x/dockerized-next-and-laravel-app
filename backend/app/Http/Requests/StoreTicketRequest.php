<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'reference' => ['required', 'numeric'],
            'name' => ['required', 'string'],
            'address'=> ['required', 'string'],
            'landline' => ['required', 'numeric'],
            'contact_number' => ['required', 'numeric'],
            'network' => ['required', 'string'],
            'service' => ['required', 'string'],
            'portability' => ['required', 'boolean'],
            'package' => ['required', 'string'],
            'created_by' => ['required', 'string'],
            'requested_date' => ['required', 'date'],
        ];
    }
}
