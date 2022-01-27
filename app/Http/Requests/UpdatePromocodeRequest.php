<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePromocodeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'            => 'min:1|max:8', 'amount' => 'required|min:1|max:10000',
            'count_uses'      => 'required|min:1|max:50', 'expiration_date' => 'nullable|date_format:Y/m/d',
            'status'          => 'required|boolean'
        ];
    }
}
