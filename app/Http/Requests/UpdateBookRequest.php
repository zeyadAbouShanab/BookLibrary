<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Book;

class UpdateBookRequest extends FormRequest
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
            'title' => 'required|max:255',
            'authors' => 'required|max:255',
            'released_at' => 'required|date|before:today',
            'pages' => 'required|numeric|min:1',
            'description' => 'nullable',
            'genres' => 'nullable|array',
            'cover_image' => 'nullable|url',
            'in_stock' => 'required|numeric|min:0'  ];
        
    }
}
