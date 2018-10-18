<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
    public function rules(){
        return [
            'nombre' => 'required|unique'
        ];
    }
    public function messages(){
        return [
            'nombre.required' => 'Por favor ingresa el nombre del producto',
            'nombre.unique' => 'El nombre del producto ya se encuentra en uso'
        ];
    }
}
