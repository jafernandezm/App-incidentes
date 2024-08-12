<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasivoRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'dorks' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:1|max:100',
            'excludeSites' => 'nullable',
            'excludeSitesHidden' => 'nullable',
        ];
    }
}
