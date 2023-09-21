<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDome extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'location' => 'required',
            'capacity' => 'required|numeric',
            'price' => 'required|numeric',
            'state' => 'required|numeric'
        ];
    }

    public function attributes(){

        return [
            'name' => 'Nombre del domo',
            'description' => 'Descripcion del domo',
            'price' => 'Precio del domo',
            'state' => 'Estado del domo',
        ];

    }

    public function messages(){
        return [
            'description.required'=>'Este domo requiere una descripcion',
            'name.required'=>'Este domo requiere un nombre',
            'location.required'=>'Este domo requiere una localizacion',
            'capacity.required'=>'Este domo requiere una capacidad',
            'price.required'=>'Este domo requiere un precio',
            'state.required'=>'Este domo requiere un estado',
            'price.numeric'=>'Este valor debe ser un numero',
            'capacity.numeric'=>'Este valor debe ser un numero',
            'state.numeric'=>'Este valor debe ser un numero'
        ];
    }
}
