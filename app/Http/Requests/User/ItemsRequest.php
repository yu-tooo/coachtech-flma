<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class ItemsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->routeIs('user.*')) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'productName' => ['required'],
            'price' => ['required', 'numeric'],
            'description' => ['required', 'min:20'],
            'image' => ['required'],
            'categories.*' =>['required'],
            'condition' => ['required'],
            'url' => ['nullable', 'url', 'max:250']
        ];
    }
}
