<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComicRequest extends FormRequest
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
            'title' => 'required|unique:comics,title|max:150|string',
            'description' => 'required',
            'thumb' => 'nullable|url|ends_with:png,jpg,webp',
            'price' => 'required|decimal:2|max:99',
            'series' => 'nullable|max:50|string',
            'sale_date' => 'nullable|date',
            'type' => 'required|string|max:30',
            'artists' => 'nullable',
            'writers' => 'nullable',
        ];
    }
}