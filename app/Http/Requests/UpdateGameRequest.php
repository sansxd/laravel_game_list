<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGameRequest extends FormRequest
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
            'name' => ['required', 'string', 'unique:games,name,' . $this->game->id],
            'description' => ['string', 'nullable'],
            'url' => ['required', 'url'],
            'url_image' => ['required', 'url'],
            'status' => ['required', 'boolean'],
        ];
    }
}