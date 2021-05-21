<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EquipoFormRequest extends FormRequest
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
            'persona'=>'required',
            'serial'=>[
                'required',
                Rule::unique('tipo_equipo')->ignore($this->route('role'))
            ],
            'tipo_equipo'=>'required|max:100',
            'color'=>'required',
            'marca'=>'max:400',
            'imagen'=>'mimes:png,bmp,jpeg'
            
        ];
    }
}
